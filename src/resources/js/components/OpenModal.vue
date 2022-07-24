<template>
<div id="overlay" @click="clickEvent">
<div id="content" class="text-center" @click="stopEvent">
<div class="card">
    <div class="card-body">
        <h3><slot></slot></h3>
<button
class="btn btn-warning btn-rounded"
@click="clickEvent">閉じる</button>
    </div>
</div>
</div>
</div>
</template>


<script>
export default {
props:{
showContent:{
    type: String,
    default: '',
    required: true
},
},

methods: {
       clickEvent(){
      this.$emit('from-child')
     },
        stopEvent(){
      event.stopPropagation()
    }
  },
}
</script>
<style>

#overlay{
  /*　要素を重ねた時の順番　*/
  z-index:1;

  /*　画面全体を覆う設定　*/
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0,0,0,0.5);

  /*　画面の中央に要素を表示させる設定　*/
  display: flex;
  align-items: center;
  justify-content: center;

}
#content{
  z-index:2;
  width:50%;
  padding: 1em;
}

</style>
