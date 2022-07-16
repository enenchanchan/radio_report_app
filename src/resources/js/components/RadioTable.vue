<template>
<div>
    <input type="text" v-model="search" class="w-100" placeholder="番組検索">
<table class="table">
    <thead>
        <tr>
            <th>番組名</th>
            <th>放送局</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="radio in getLists" :key="radio.id">
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
}
        },

        computed:{
            search_radios(){
                return this.radios.filter(radio=>{
                    return radio.radio_title.includes(this.search)||
                    radio.broadcaster.includes(this.search);
              })
            },
         getLists: function(){
            let current = this.currentPage * this.perPage;
            let start = current - this.perPage;
            return this.search_radios.slice(start, current);
    },
 getPageCount: function() {
      return Math.ceil(this.search_radios.length / this.perPage);
    },

        },

methods:{
clickCallback:function(pageNum){
    this.currentPage = Number(pageNum);
}
},



}
</script>