<template>
  <header class="the_header">
    <nav>
      <ul>
        <li>
          <router-link :to="{ name: 'Home' }">Home</router-link>
        </li>
        <li v-if="!$store.state.login">
          <router-link :to="{ name: 'Login' }">Login</router-link>
        </li>
        <div v-else>
          <li>
            <router-link :to="{ name: 'Tasks' }">Tasks</router-link>
          </li>
          <li>
            <router-link :to="{ name: 'Profile' }">Profile</router-link>
          </li>
          <li>
            <a v-if="$store.state.login" href="#" @click.prevent="logout"
              >Logout</a
            >
          </li>
        </div>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$router.push({ name: "Login" });
      this.$store.dispatch("logout");
    },
  },
};
</script>

<style lang="scss">
.the_header {
  display: block;
  nav {
    padding: 30px;
    display: flex;
    justify-content: center;
    ul {
      list-style: none;
      display: flex;
    }
    li {
      display: inline-block;
    }
    a {
      font-weight: bold;
      color: #2c3e50;
      padding: 1rem;
      margin: 0 5px;
      text-decoration: none;

      &.router-link-exact-active {
        color: #cc4514;
      }
    }
  }
}
</style>
