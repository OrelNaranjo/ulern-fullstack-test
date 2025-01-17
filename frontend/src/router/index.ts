import { createRouter, createWebHistory } from 'vue-router'
import SessionView from '../views/SessionView.vue'
import LayoutView from '../views/LayoutView.vue'
import Profile from '../components/UserProfile.vue'
import Dashboard from '../components/HomePage.vue'
import { authGuard } from '../guards/authGuard'

const routes = [
  {
    path: '/auth/login',
    name: 'login',
    component: SessionView,
    meta: { title: 'Iniciar Sesión' },
  },
  {
    path: '/auth/register',
    name: 'register',
    component: SessionView,
    meta: { title: 'Registro' },
  },
  {
    path: '/',
    component: LayoutView,
    children: [
      {
        path: '',
        component: Dashboard,
        meta: {
          requiresAuth: true,
          title: 'Dashboard',
        },
      },
      {
        path: 'profile',
        component: Profile,
        meta: { requiresAuth: true, title: 'Perfil' },
      },
    ],
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: '/',
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

router.beforeEach(authGuard)

export default router
