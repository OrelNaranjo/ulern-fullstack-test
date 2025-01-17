<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '../stores/userStore'
import axios from '../axios'

const userStore = useUserStore()
const userProfile = ref(userStore.profile)
const errorMessage = ref('')

const firstName = ref('')
const lastName = ref('')
const phoneNumber = ref('')
const email = ref('')

const router = useRouter()
const emit = defineEmits(['profile-updated'])

onMounted(async () => {
  try {
    await userStore.fetchUserProfile()
    userProfile.value = userStore.profile
    if (userProfile.value) {
      firstName.value = userProfile.value.first_name
      lastName.value = userProfile.value.last_name
      phoneNumber.value = userProfile.value.phone_number
      email.value = userProfile.value.email
    }
  } catch (error) {
    console.error('Failed to fetch user profile:', error)
    errorMessage.value =
      'Error al obtener el perfil del usuario. Por favor, intenta nuevamente.'
    router.push('/login')
  }
})

const handleSubmit = async () => {
  if (
    !firstName.value ||
    !lastName.value ||
    !phoneNumber.value ||
    !email.value
  ) {
    errorMessage.value = 'Todos los campos son obligatorios.'
    return
  }

  try {
    await axios.put('/profile', {
      first_name: firstName.value,
      last_name: lastName.value,
      phone_number: phoneNumber.value,
      email: email.value,
    })
    await userStore.fetchUserProfile(true)
    emit('profile-updated')
  } catch (error) {
    console.error('Failed to update profile:', error)
    errorMessage.value =
      'Error al actualizar el perfil. Por favor, intenta nuevamente.'
  }
}
</script>

<template>
  <h2 class="text-2xl font-bold mb-6 text-center">Editar Perfil</h2>
  <form @submit.prevent="handleSubmit">
    <div class="mb-4 relative">
      <label for="firstName" class="sr-only">Nombre</label>
      <font-awesome-icon
        :icon="['fas', 'user']"
        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-800"
      />
      <input
        type="text"
        id="firstName"
        v-model="firstName"
        placeholder="Nombre"
        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-gray-800 text-gray-800 focus:outline-none focus:ring focus:border-indigo-300"
        required
      />
    </div>
    <div class="mb-4 relative">
      <label for="lastName" class="sr-only">Apellido</label>
      <font-awesome-icon
        :icon="['fas', 'user']"
        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-800"
      />
      <input
        type="text"
        id="lastName"
        v-model="lastName"
        placeholder="Apellido"
        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-gray-800 text-gray-800 focus:outline-none focus:ring focus:border-indigo-300"
        required
      />
    </div>
    <div class="mb-4 relative">
      <label for="phoneNumber" class="sr-only">Teléfono</label>
      <font-awesome-icon
        :icon="['fas', 'phone']"
        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-800"
      />
      <input
        type="text"
        id="phoneNumber"
        v-model="phoneNumber"
        placeholder="Teléfono"
        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-gray-800 text-gray-800 focus:outline-none focus:ring focus:border-indigo-300"
        required
      />
    </div>
    <div class="mb-4 relative">
      <label for="email" class="sr-only">Correo Electrónico</label>
      <font-awesome-icon
        :icon="['fas', 'envelope']"
        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-800"
      />
      <input
        type="email"
        id="email"
        v-model="email"
        placeholder="Correo Electrónico"
        class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-gray-800 text-gray-800 focus:outline-none focus:ring focus:border-indigo-300"
        required
      />
    </div>
    <button
      type="submit"
      class="w-full bg-yellow-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition duration-300"
    >
      Guardar Cambios
    </button>
    <p v-if="errorMessage" class="mt-4 text-center text-red-500">
      {{ errorMessage }}
    </p>
  </form>
</template>

<style scoped>
.bg-white {
  background-color: var(--color-card);
}
.shadow-md {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.rounded-lg {
  border-radius: 0.5rem;
}
</style>
