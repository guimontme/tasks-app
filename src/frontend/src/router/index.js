import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Tasks from '../views/Tasks.vue';
import Login from '../views/Login.vue';
import Profile from '../views/User/Profile.vue';
import NewUser from '../views/User/NewUser.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/tasks',
    name: 'Tasks',
    component: Tasks,
    // meta: {
    //   login: true,
    // },
  },
  {
    path: '/user',
    name: 'Profile',
    component: Profile,
  }, 
  {
    path: '/user/new',
    name: 'NewUser',
    component: NewUser,
  }, 


];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

// router.beforeEach((to, from, next) => {
//   if (to.matched.some((record) => record.meta.login)) {
//     if (!localStorage.token) next("/login");
//   }
//   next();
// });

export default router;
