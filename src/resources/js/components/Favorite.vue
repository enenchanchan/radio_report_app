<template>
  <div>
    <button type="button" class="btn shadow-none">
      <i
        class="fa-solid fa-star"
        :class="{ 'text-warning': this.isFavoriteBy }"
        @click="clickFavorite"
      ></i>
    </button>
  </div>
</template>
<script>
export default {
  props: {
    initialIsFavoriteBy: {
      type: Boolean,
      default: false,
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
      isFavoriteBy: this.initialIsFavoriteBy,
    };
  },

  methods: {
    clickFavorite() {
      if (!this.authorized) {
        alert("お気に入り機能はログイン中のみ使用できます");
        return;
      }
      this.isFavoriteBy ? this.unfavorite() : this.favorite();
    },
    async favorite() {
      const response = await axios.put(this.endpoint);

      this.isFavoriteBy = true;
    },
    async unfavorite() {
      const response = await axios.delete(this.endpoint);

      this.isFavoriteBy = false;
    },
  },
};
</script>
