<template>
  <section class="NewUser">
    <h1 class="title">New user</h1>
    <FormUser :user="user" pwdPlacehoder="Min. 6 characters">
      <div class="button_group">
        <button class="button_create" @click.prevent="createUser">
          Create a new account
        </button>
      </div>
    </FormUser>
    <ErrorNotification :errors="errors" />
    <PageLoading v-if="loading" />
  </section>
</template>

<script>
import { api } from "@/services.js";
import FormUser from "@/components/FormUser.vue";
export default {
  name: "NewUser",
  data() {
    return {
      errors: null,
      loading: false,
      user: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  components: { FormUser },
  methods: {
    async createUser() {
      this.loading = true;
      this.errors = null;
      try {
        if (this.user.name && this.user.email && this.user.password) {
          await api.post("/register", this.user).then((res) => {
            this.message = res.data.message;
            this.$router.push({ name: "Profile" });
            this.loading = false;
          });
        }
      } catch (error) {
        this.loading = false;
        this.errors = error.response.data.error;
      }
    },
  },
};
</script>

<style lang="scss">
.NewUser {
  button {
    display: block;
    color: white;
    font-size: 1rem;
    margin: 20px auto;
  }
  .button_create {
    background: #254438;
    width: 60%;
  }
}
</style>