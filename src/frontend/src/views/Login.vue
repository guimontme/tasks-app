<template>
  <section class="login_page">
    <h1>Login</h1>
    <form class="login_form">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" v-model="login.email" />
      <label for="password">Password</label>
      <input
        type="password"
        name="password"
        id="password"
        v-model="login.password"
      />
      <button @click.prevent="handleLogin">Login</button>
    </form>
    <ErrorNotification :errors="errors" />
    <PageLoading v-if="loading" />
  </section>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      login: {
        email: "",
        password: "",
      },
      errors: [],
      loading: false,
    };
  },
  methods: {
    async handleLogin() {
      this.errors = [];
      this.loading = true;
      try {
        await this.$store.dispatch("loginUser", this.login).then(() => {
          this.$store.dispatch("getUser");
          this.$router.push({ name: "Tasks" });
        });
      } catch (err) {
        this.errors = err.response.data.error;
        this.loading = false;
      }
    },
  },
};
</script>

<style lang="scss">
.login_page {
  display: block;
  h1 {
    text-align: center;
  }
  .login_form {
    max-width: 400px;
    padding: 20px;
    margin: 0 auto;
    label {
      display: block;
      margin: 1rem 0 0.5rem;
    }
    input {
      width: 100%;
    }
    button {
      display: block;
      margin: 20px auto;
      width: 60%;
      color: white;
      background-color: #cc4514;
    }
  }
}
</style>
