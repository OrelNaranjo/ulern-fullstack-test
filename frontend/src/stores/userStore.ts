import { defineStore } from 'pinia'
import axios from '../axios'
import type { UserProfile } from '../interfaces/UserProfile'

export const useUserStore = defineStore('user', {
  state: () => ({
    profile: null as UserProfile | null,
    isProfileFetched: false,
  }),
  actions: {
    async fetchUserProfile() {
      if (this.isProfileFetched) return

      try {
        const response = await axios.get<UserProfile>('/profile')
        this.profile = response.data
        this.isProfileFetched = true
      } catch (error) {
        console.error('Error al obtener el perfil de usuario:', error)
        alert('Error al obtener el perfil de usuario.')
      }
    },

    async logout() {
      try {
        const token =
          localStorage.getItem('token') ?? sessionStorage.getItem('token')
        if (!token) {
          throw new Error('No se encontró el token de autenticación.')
        }

        await axios.post(
          '/logout',
          {},
          {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          },
        )
      } catch (error) {
        console.error('Error al cerrar sesión en el servidor:', error)
        alert('Error al cerrar sesión en el servidor.')
      } finally {
        this.profile = null
        this.isProfileFetched = false
        localStorage.removeItem('token')
        sessionStorage.removeItem('token')
        window.location.href = '/auth/login'
      }
    },
  },
})
