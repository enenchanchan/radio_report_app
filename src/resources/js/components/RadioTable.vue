<template>
<div>
    <input type="text" v-model="search" class="w-100" placeholder="番組検索">
<table class="table">
    <thead>
        <tr>
            <th @click="sortBy('radio_title')">番組名<span class="arrow" :class="addClass('radio_title') "></span></th>
            <th @click="sortBy('broadcaster')">放送局<span class="arrow" :class="addClass('broadcaster')"></span></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="radio in sort_radios,getLists" :key="radio.id">
            <td><a :href="`/radios/${radio.id}`">{{radio.radio_title}}</a></td>
            <td>{{radio.broadcaster}}</td>
        </tr>
    </tbody>
</table>
<paginate
  v-model="currentPage"
    :page-count="getPageCount"
    :page-range="5"
    :click-handler="clickCallback"
    :prev-text="'&lt;'"
    :prev-link-class="'page-link'"
    :next-text="'&gt;'"
    :next-link-class="'page-link'"
    :first-last-button="true"
    :first-button-text="'&laquo;'"
    :last-button-text="'&raquo;'"
    :container-class="'pagination justify-content-center mt-3'"
    :page-class="'page-item border'"
    :page-link-class="'page-link'"
>
</paginate>

</div>
</template>

<script>
export default{
     mounted(){
        axios.get('/api/radios')
        .then(response => {
            this.radios =response.data;
    });
    },
    data(){
return{
    radios:[],
    search:'',
    perPage:5,
    currentPage:1,
    sort_key:"",
    sort_asc:true,
}
        },

        computed:{
            search_radios(){
                return this.radios.filter(radio=>{
                    return radio.radio_title.includes(this.search)||
                    radio.broadcaster.includes(this.search);
              },
                    this.currentPage = 1)
            },
         getLists: function(){
            let current = this.currentPage * this.perPage;
            let start = current - this.perPage;
            return this.search_radios.slice(start, current);
    },
 getPageCount: function() {
      return Math.ceil(this.search_radios.length / this.perPage);
    },
 sort_radios() {
    if (this.sort_key != "") {
        let set = 1;
        this.sort_asc ? (set =1):(set =-1);
      this.radios.sort((a, b) => {
        if (a[this.sort_key] < b[this.sort_key]) return -1 * set;
        if (a[this.sort_key] > b[this.sort_key]) return 1 * set;
        return 0;
      });
      return this.search_radios;
    } else {
      return this.search_radios;
    }
  },
        },

methods:{
clickCallback:function(pageNum){
    this.currentPage = Number(pageNum);
},
sortBy(key){
    this.sort_key === key
    ?(this.sort_asc = !this.sort_asc)
    :(this.sort_asc = true);
this.sort_key=key;
},
addClass(key) {
  return {
    asc: this.sort_key === key && this.sort_asc,
    desc: this.sort_key === key && !this.sort_asc,
  }
},
},
}
</script>
<style scoped>
table{
    border: 1px solid black;
    margin-top: 10px;
}

.arrow {
display: inline-block;
  vertical-align: middle;
  width: 0;
  height: 0;
  margin-left: 5px;
  opacity: 0.66;
}

.arrow.asc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-bottom: 4px solid black;
}

.arrow.desc {
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
  border-top: 4px solid black;
}

</style>