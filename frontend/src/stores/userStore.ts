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
        await axios.post('/logout')
      } catch (error) {
        console.error('Error al cerrar sesión en el servidor:', error)
        alert('Error al cerrar sesión en el servidor.')
      } finally {
        this.profile = null
        this.isProfileFetched = false
        localStorage.removeItem('token')
        sessionStorage.removeItem('token')
      }
    },
  },
})
