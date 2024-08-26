import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../js/Pages/Dashboard.vue';
import GuessVerse from '../js/Pages/Question/GuessVerse.vue';

const routes = [
  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard,
  },
  {
    path: '/guess-verse',
    name: 'GuessVerse',
    component: GuessVerse,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
