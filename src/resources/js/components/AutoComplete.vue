<template>
<div>
    <input
    type="text"
    v-model="query"
    placeholder="番組名"
    class="form-control"
    name="radio_title"
    autocomplete="off"
    @input="getRadioList"
    @focus="open = true"
    @change="change"
    @keydown.down="down"
    @keyup.up="up"
    @keydown.enter="enter"
    >
    <input class="" :value="results.id" name="radio_id" >
<div v-if="results.length && open">
    <div class="list-group">
        <option
        v-for="(result,index) in results"
        :key="result.index"
            class="list-group-item list-group-item-action"
            :class="{ active: index === current }"
            @click="suggestionClick(index)"
            @mouseover="mouseOver(index)"
            v-text="result.radio_title"
            >
        </option>
    </div>
</div>
</div>
</template>

<script>
export default {
    data(){
        return{
query:"",
results:[],
open:false,
current: 0,
        };
    },

methods:{
getRadioList(){
this.results = [];
if (this.query.length >= 1){
        axios.get('/api/articles/create',{
            params:{query: this.query}
        })
        .then(response => {
            this.results = response.data;
            if(this.results){
                this.open = true;
            }
})
    .catch(error => {
            console.log(error);
    })
}
},

mouseOver:function(index){
    this.current = index;
},

up(){
    if (this.current > 0)this.current--;
},

down(){
    if (this.current < this.results.length - 1)this.current++;
},

 change() {
            if (this.open == false) {
                this.open = true;
                this.current = 0;
            }
        },

enter(){
if(this.results[this.current]){
    this.query = this.results[this.current].radio_title;
this.results = this.results[this.current];
this.open = false,
this.current = 0;
}
},

suggestionClick(index){
this.query = this.results[index].radio_title;
this.open = false,
this.current = 0;
this.results = this.results[index];
},

}

};
</script>