import { createRouter, createWebHistory } from 'vue-router'
import SessionView from '../views/SessionView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: '/login',
    },
    {
      path: '/login',
      name: 'login',
      component: SessionView,
    },
    {
      path: '/register',
      name: 'register',
      component: SessionView,
    },
  ],
})

export default router
