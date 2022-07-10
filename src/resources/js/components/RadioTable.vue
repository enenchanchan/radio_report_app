<template>
<div>
    <h2>Vue版</h2>
    <div > {{message}}:<input type="text" v-model="search" class="w-75"></div>
<table class="table">
    <thead>
        <tr>
            <th>番組名</th>
            <th>放送日時</th>
            <th>放送局</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="radio in search_radios" :key="radio.id">
            <td><a :href="`/radios/${radio.id}`">{{radio.radio_title}}</a></td>
            <td>{{radio.radio_date}}</td>
            <td>{{radio.broadcaster}}</td>
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
}
        },
        computed:{
            search_radios(){
                return this.radios.filter(radio=>{
                    return radio.radio_title.includes(this.search)||
                    radio.broadcaster.includes(this.search)
                })
            },
        },
}
</script>