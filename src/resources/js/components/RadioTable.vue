<template>
<div>
    <h2>Vue版</h2>
    <div> {{message}}:<input type="text" v-model="search"></div>
<h1>{{sort_key}}</h1>
<table class="table">
    <thead>
        <tr>
            <th @click="sortBy('radio_title')">番組名</th>
            <th @click="sortBy('radio_date')">放送日時</th>
            <th @click="sortBy('broadcaster')">放送局</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="radio in sort_radios" :key="radio.id">
            <td >{{radio.radio_title}}</td>
            <td >{{radio.radio_date}}</td>
            <td >{{radio.broadcaster}}</td>
        </tr>
    </tbody>
</table>
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
    message:"検索",
    radios:[],
    search:'',
    sort_key:"",
sort_asc:true,
}
        },
        computed:{
            search_radios(){
                return this.radios.filter(radio=>{
                    return radio.radio_title.includes(this.search)||
                    radio.broadcaster.includes(this.search)
                })
            },
            sort_radios(){
 if (this.sort_key != "") {
     let set =1;
     this.sort_asc?(set =1):(set=-1);
      this.radios.sort((a, b) => {
        if (a[this.sort_key] < b[this.sort_key]) return -1 * set;
        if (a[this.sort_key] > b[this.sort_key]) return 1 * set ;
        return 0;
      });
      return this.radios;
    } else {
      return this.radios;
    }
            },
        },
        methods:{
            sortBy(key){
                this.sort_key === key
                ? (this.sort_asc = !this.sort_asc)
                :(this.sort_asc =true);
                this.sort_key =key;
            }

        }
}
</script>