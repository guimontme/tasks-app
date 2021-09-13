<template>
  <div id="app">
    <TheHeader />
    <main>
      <transition mode="out-in">
        <router-view class="container" />
      </transition>
    </main>
    <TheFooter />
  </div>
</template>

<script>
import { api } from "@/services.js";
import TheHeader from "./components/TheHeader.vue";
import TheFooter from "./components/TheFooter.vue";
export default {
  components: {
    TheHeader,
    TheFooter,
  },
  created() {
    if (localStorage.token) {
      api
        .getUser()
        .then(() => {
          this.$store.dispatch("getUser");
        })
        .catch((err) => {
          console.log(err);
          localStorage.removeItem("token");
        });
    }
  },
};
</script>

<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: sans-serif;
  background: #1a202c;
  color: #fff;
}
button {
  padding: 10px 20px;
  border-radius: 4px;
  min-height: 40px;
  border: none;
  cursor: pointer;
  font-size: 1rem;
  font-weight: 700;
}
a {
  text-decoration: none;
  color: #92374d;
  font-weight: 600;
}
.container {
  padding: 10px 20px;
  .title {
    text-align: center;
  }
}
input {
  padding: 10px;
  display: block;
  max-width: 100%;
  border-radius: 4px;
  height: 40px;
  font-size: 1rem;
  border: none;
  transition: all 0.3s ease;
  &[type="checkboxe"],
  &[type="radio"] {
    cursor: pointer;
  }
  &:focus {
    box-shadow: 0 2px 6px rgba(#92374d, 0.8);
    outline: none;
    transform: scale(1.05);
  }
}
#app {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  main {
    flex: 1;
    padding: 20px;
  }
}

// Transition
.v-enter,
.v-leave-to {
  opacity: 0;
}

.v-enter {
  transform: translate3d(0, -30px, 0);
}

.v-leave-to {
  transform: translate3d(0, 30px, 0);
}

.v-enter-active,
.v-leave-active {
  transition: all 0.3s ease-in-out;
}
</style>
