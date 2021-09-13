<template>
  <transition mode="out-in">
    <p v-if="message" class="Message">{{ message }}</p>
  </transition>
</template>

<script>
export default {
  name: "Message",
  props: {
    message: String,
  },
};
</script>

<style lang="scss" scoped>
.Message {
  color: rgb(10, 71, 10);
}
</style>
