<template>
  <div>
    <button type="button" class="btn shadow-none">
      <i
        class="fa-regular fa-star"
        :class="{ 'text-warning': this.favoritesCount }"
      ></i>
    </button>
  </div>
</template>
<script>
export default {
  props: {
    initiallsFavorite: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      favoritesCount: this.initiallsFavorite,
    };
  },
};
</script>
