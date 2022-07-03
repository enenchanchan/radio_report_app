<template>
  <div>
    <button type="button" class="btn shadow-none" >
      <i
        class="fa-solid fa-star"
        :class="{ 'text-warning': this.isFavoritedBy }"
        @click="clickFavorite"
      >
      </i>
    </button>
      {{ countFavorites }}
  </div>
</template>


<script>
export default {
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
  },
  data() {
    return {
      isFavoritedBy: this.initialIsFavoritedBy,
      countFavorites: this.initialCountFavorites,
    };
  },
  methods: {
    clickFavorite() {
      if (!this.authorized) {
        alert("番組のお気に入り機能はログイン時のみ使用可能です。");
        return;
      }
      this.isFavoritedBy ? this.unfavorite() : this.favorite();
    },
    async favorite() {
      const response = await axios.put(this.endpoint);
      this.isFavoritedBy = true;
      this.countFavorites = response.data.countFavorites;
    },
    async unfavorite() {
      const response = await axios.delete(this.endpoint);
      this.isFavoritedBy = false;
      this.countFavorites = response.data.countFavorites;
    },
  },
};
</script>

