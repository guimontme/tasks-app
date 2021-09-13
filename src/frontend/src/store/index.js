import Vue from 'vue';
import Vuex from 'vuex';
import { api } from "@/services.js";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user_tasks: [],
    login: false,
    user: {
      name: '',
      email: '',
      password: '',
    },
  },
  mutations: {
    UPDATE_LOGIN(state, payload) {
      state.login = payload;
    },
    UPDATE_USER(state, payload) {
      state.user = Object.assign(state.user, payload);
    },
    UPDATE_USER_TASKS(state, payload) {
      state.user_tasks = payload;
    },
    ADD_USER_TASKS(state, payload) {
      state.user_tasks.push(payload);
    },
  },
  actions: {
    loginUser(context, payload) {
      return api.login({
          email: payload.email,
          password: payload.password,
        })
        .then((response) => {
          window.localStorage.token = `Bearer ${response.data.token}`;
          // context.dispatch("getUser");
        });
    },
    getUser(context) {
      return api.getUser().then((response) => {
        context.commit("UPDATE_LOGIN", true);
        context.commit("UPDATE_USER", response.data);
      });
    },
    createUser(context, payload) {
      context.commit("UPDATE_USER", { id: payload.email });
      return api.post("/register", payload);
    },
    getUserTasks(context) {
      api.get('/tasks').then((res) => {
        context.commit('UPDATE_USER_TASKS', res.data.data);
      });
    },
    logout(context) {
      context.commit("UPDATE_LOGIN", false);
      return api.logout().then(() => {
        context.commit("UPDATE_USER_TASKS", []);
        context.commit("UPDATE_USER", {
          created_at: '',
          email: '',
          id: '',
          name: '',
          password: '',
          updated_at: '',
        });
        localStorage.removeItem("token");
      });
    },
    addUserTasks(context, payload) {
      context.commit('ADD_USER_TASKS', payload);
      api.post('/tasks', payload)
      .then(() => {
        context.dispatch("getUserTasks");
      });
    }
  },
});
