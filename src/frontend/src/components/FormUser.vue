<template>
  <form class="FormUser">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" v-model="user.name" />
    <label for="email">Email</label>
    <input type="text" name="email" id="email" v-model="user.email" />
    <label for="password">Password</label>
    <input
      type="password"
      name="password"
      id="password"
      v-model="user.password"
      minlength="6"
      :placeholder="pwdPlacehoder"
    />
    <slot></slot>
  </form>
</template>

<script>
export default {
  name: "FormUser",
  props: ["user", "pwdPlacehoder"],
};
</script>

<style lang="scss">
.FormUser {
  max-width: 450px;
  padding: 0 20px;
  margin: 0 auto;
  label {
    display: block;
    margin: 0.5rem 0;
  }
  input {
    margin-bottom: 1rem;
    width: 100%;
  }
}
</style>
