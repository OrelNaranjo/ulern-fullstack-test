<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from '../axios'
import { useRouter } from 'vue-router'
import type { UserProfile } from '../interfaces/UserProfile'

const userProfile = ref<UserProfile | null>(null)
const errorMessage = ref('')

const router = useRouter()

const fetchUserProfile = async () => {
  try {
    const response = await axios.get('/profile')
    userProfile.value = response.data
  } catch (error) {
    console.error('Failed to fetch user profile:', error)
    errorMessage.value =
      'Error al obtener el perfil del usuario. Por favor, intenta nuevamente.'
    router.push('/login')
  }
}

onMounted(() => {
  fetchUserProfile()
})
</script>

<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Perfil del Usuario</h1>
    <div v-if="errorMessage" class="text-red-500">{{ errorMessage }}</div>
    <div v-else-if="userProfile">
      <p>
        <strong>Nombre:</strong> {{ userProfile.first_name }}
        {{ userProfile.last_name }}
      </p>
      <p><strong>Correo Electrónico:</strong> {{ userProfile.email }}</p>
      <p><strong>Teléfono:</strong> {{ userProfile.phone_number }}</p>
    </div>
    <div v-else>Cargando...</div>
  </div>
</template>
