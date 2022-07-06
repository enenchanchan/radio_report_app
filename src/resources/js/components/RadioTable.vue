<template>
<div>
    <h2>Vue版</h2>
    <h1>{{message}}</h1>
    <input type="text" v-model="search">
<table class="table">
    <thead>
        <tr>
            <th>番組名</th>
            <th>放送日時</th>
            <th>放送局</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="radio in radios" :key="radio.id">
            <td><a href="">{{radio.radio_title}}</a></td>
            <td>{{radio.radio_date}}</td>
            <td>{{radio.broadcaster}}</td>
        </tr>
    </tbody>
</table>
</div>
</template>

<script>
export default{
    props:[
        "radios"
        ],
    data:{
        message:'検索',
        search:"",
        }
}
</script>