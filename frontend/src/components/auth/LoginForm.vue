<script setup lang="ts">
import { ref } from 'vue'
import { AxiosError } from 'axios'
import axios from '../../axios'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const rememberMe = ref(false)
const errorMessage = ref('')

const router = useRouter()

const handleSubmit = async () => {
  if (!email.value || !password.value) {
    errorMessage.value = 'Todos los campos son obligatorios.'
    return
  }

  try {
    const response = await axios.post('/login', {
      email: email.value,
      password: password.value,
    })
    if (rememberMe.value) {
      localStorage.setItem('token', response.data.token)
    } else {
      sessionStorage.setItem('token', response.data.token)
    }
    router.push('/dashboard')
  } catch (error) {
    if (error instanceof AxiosError) {
      errorMessage.value =
        error.response?.data?.message ||
        'Error al iniciar sesión. Por favor, verifica tus credenciales.'
    } else {
      errorMessage.value = 'Error desconocido al iniciar sesión.'
    }
  }
}
</script>

<template>
  <div
    class="relative bg-white bg-opacity-5 backdrop-blur-lg p-8 rounded-xl shadow-2xl w-full max-w-md md:block hidden"
  >
    <div class="flex justify-center mb-4">
      <font-awesome-icon :icon="['fas', 'user']" size="3x" />
    </div>

    <h2 class="text-2xl font-bold uppercase mb-6 text-center">
      Iniciar Sesión
    </h2>
    <form @submit.prevent="handleSubmit">
      <div class="mb-4 relative">
        <label for="email" class="sr-only">Correo Electrónico</label>
        <font-awesome-icon
          :icon="['fas', 'envelope']"
          class="absolute left-3 top-1/2 transform -translate-y-1/2"
        />
        <input
          type="email"
          id="email"
          v-model="email"
          placeholder="Correo Electrónico"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
      <div class="mb-6 relative">
        <label for="password" class="sr-only">Contraseña</label>
        <font-awesome-icon
          :icon="['fas', 'lock']"
          class="absolute left-3 top-1/2 transform -translate-y-1/2"
        />
        <input
          type="password"
          id="password"
          v-model="password"
          placeholder="Contraseña"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent text-white placeholder-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
      <div class="mb-4 flex items-center">
        <input
          type="checkbox"
          id="rememberMe"
          v-model="rememberMe"
          class="mr-2"
        />
        <label for="rememberMe" class="text-gray-700">Recuérdame</label>
      </div>
      <button
        type="submit"
        class="w-full bg-yellow-500 text-indigo-500 py-2 rounded-lg hover:bg-indigo-500 hover:text-white transition duration-300"
      >
        Iniciar Sesión
      </button>
      <p v-if="errorMessage" class="mt-4 text-center text-red-500">
        {{ errorMessage }}
      </p>
    </form>
    <p class="mt-4 text-center">
      ¿No tienes una cuenta?
      <a href="/register" class="text-yellow-500 hover:underline">Regístrate</a>
    </p>
  </div>
</template>
