<template>
  <div>
    <button type="button" class="btn shadow-none" >
      <i
        class="fa-solid fa-star"
        :class="{ 'text-warning': isFavoritedBy }"
      @click="clickFavorite();"
      >
      </i>
    </button>
    <openModal
    v-show="showContent"
    :show-content="showContent"
    @from-child="closeModal"
    >{{message}}
    </openModal>
    <small :class="countFavorites"></small>
  </div>
</template>


<script>
import openModal from './OpenModal.vue';

export default {
  components:{
    openModal
  },
  props: {
    initialIsFavoritedBy: {
      type: Boolean,
      default: false,
    },
    initialCountFavorites: {
      type: Number,
      default: 0,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
    },
    message:{
      type:String
    }

  },
  data() {
    return {
      isFavoritedBy: this.initialIsFavoritedBy,
      countFavorites: this.initialCountFavorites,
      showContent: ''
    };
  },
  methods: {
    clickFavorite() {
      if (!this.authorized) {
        this.message = ("番組のお気に入り機能はログイン時のみ使用可能です。")
        this.openModal();
        return;
      }
      this.isFavoritedBy ? this.unfavorite() : this.favorite();
    },
    async favorite() {
      const response = await axios.put(this.endpoint);
      this.isFavoritedBy = true;
      this.countFavorites = response.data.countFavorites;
      this.message = 'お気に入り番組に登録しました。'
      this.openModal();
    },
    async unfavorite() {
      const response = await axios.delete(this.endpoint);
      this.isFavoritedBy = false;
      this.countFavorites = response.data.countFavorites;
      this.message = 'お気に入り番組から解除しました。'
      this.openModal();
    },
   openModal(){
  this.showContent = true
    },
    closeModal(){
      this.showContent = false
    },

  },
};
</script>

