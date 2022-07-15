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
        <tr v-for="radio in search_radios" :key="radio.id">
            <td><a :href="`/radios/${radio.id}`">{{radio.radio_title}}</a></td>
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