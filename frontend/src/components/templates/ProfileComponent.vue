<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '../../stores/userStore'
import axios from '../../axios'

const showMenu = ref(false)
const router = useRouter()
const userStore = useUserStore()

const toggleMenu = () => {
  showMenu.value = !showMenu.value
}

const logout = async () => {
  try {
    await axios.post('/logout')
    userStore.logout()
    router.push('/auth/login')
  } catch (error) {
    console.error('Error al cerrar sesión:', error)
    alert('No se pudo cerrar la sesión correctamente.')
  }
}

const userInitial = computed(() => {
  return userStore.profile?.first_name?.charAt(0).toUpperCase() || ''
})

onMounted(() => {
  if (!userStore.profile) {
    userStore.fetchUserProfile()
  }
})
</script>

<template>
  <div class="relative">
    <div
      class="w-10 h-10 rounded-full bg-gray-500 text-white flex items-center justify-center cursor-pointer"
      @click="toggleMenu"
    >
      {{ userInitial }}
    </div>
    <div
      v-if="showMenu"
      class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10"
    >
      <ul>
        <li>
          <router-link
            to="/profile"
            class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
            >Perfil</router-link
          >
        </li>
        <li>
          <button
            @click="logout"
            class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-200"
          >
            Cerrar Sesión
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>
