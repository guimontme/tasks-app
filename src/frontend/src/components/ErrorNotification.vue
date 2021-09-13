<template>
  <transition mode="out-in">
    <ul class="errors" v-if="errors !== null">
      <li v-for="(error, key) in errors" :key="key">
        <strong>{{ key }}:</strong> {{ error[0] }}
      </li>
    </ul>
  </transition>
</template>

<script>
export default {
  name: "ErrorNotification",
  props: {
    errors: Object,
  },
};
</script>

<style lang="scss" scoped>
.errors {
  margin: 20px auto;
  list-style: none;

  li {
    color: rgb(158, 42, 42);
    text-align: center;
  }
}
</style>
