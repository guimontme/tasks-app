<template>
  <section class="EditUser">
    <h1 class="title">Edit user</h1>
    <FormUser :user="user" pwdPlacehoder="Edit your password">
      <div class="button_group">
        <button class="button_update" @click.prevent="updateUser">Edit</button>
        <button class="button_delete" @click.prevent="handleDelete">
          Delete your user
        </button>
      </div>
    </FormUser>
    <p class="new_user">
      Register a <router-link :to="{ name: 'NewUser' }">new user</router-link>.
    </p>
    <Modal modal="confirm" v-if="modal">
      <template v-slot:header>
        <h2>Deleting user</h2>
      </template>
      <p>Don't go away!</p>
      <p>Are you sure of deleting your account?</p>
      <template v-slot:footer>
        <div class="button_group modal">
          <button @click="deleteUser" class="button_delete">Yes</button>
          <button @click="modal = !modal" class="button_update">No</button>
        </div>
      </template>
    </Modal>
  </section>
</template>

<script>
import { api } from "@/services.js";
import FormUser from "@/components/FormUser.vue";
import Modal from "@/components/Modal.vue";
export default {
  components: { FormUser, Modal },
  data() {
    return {
      confirm: false,
      modal: false,
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
  },
  methods: {
    updateUser() {
      api.put("/user", this.$store.state.user);
    },
    handleDelete() {
      this.modal = true;
    },
    deleteUser() {
      api.delete("/user");
      this.$router.push({ name: "Login" });
      this.$store.dispatch("logout");
    },
  },
};
</script>

<style lang="scss">
.EditUser {
  button {
    display: block;
    color: white;
    font-size: 1rem;
  }
  .button_group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
  }
  .button_update {
    background: #254438;
  }
  .button_delete {
    background: #9e3127;
  }
  .new_user {
    padding: 20px;
    text-align: center;
  }
}
</style>