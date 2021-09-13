import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import PageLoading from './components/PageLoading.vue';
import ErrorNotification from './components/ErrorNotification.vue';
import Message from './components/Message.vue';

Vue.config.productionTip = false;

Vue.component("PageLoading", PageLoading);
Vue.component("ErrorNotification", ErrorNotification);
Vue.component("Message", Message);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');
