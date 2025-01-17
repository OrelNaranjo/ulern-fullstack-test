import type { NavigationGuardNext, RouteLocationNormalized } from 'vue-router'
import { useUserStore } from '../stores/userStore'

export const authGuard = async (
  to: RouteLocationNormalized,
  from: RouteLocationNormalized,
  next: NavigationGuardNext,
) => {
  const userStore = useUserStore()
  const isAuthenticated =
    localStorage.getItem('token') ?? sessionStorage.getItem('token')

  if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
    next({ path: '/auth/login' })
  } else {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      await userStore.fetchUserProfile()
    }
    next()
  }
}
