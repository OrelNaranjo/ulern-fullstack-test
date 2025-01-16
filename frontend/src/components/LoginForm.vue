<script setup lang="ts">
import { ref } from 'vue'

const email = ref('')
const password = ref('')

const handleSubmit = () => {
  console.log('Correo Electrónico:', email.value)
  console.log('Contraseña:', password.value)
}
</script>

<template>
  <div class="min-h-screen flex flex-col items-center justify-center p-4 text-white">
    <div class="absolute inset-0">
      <svg
        class="w-full h-full"
        xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none"
        viewBox="0 0 800 800"
      >
        <defs>
          <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%">
            <stop offset="0%" style="stop-color: #3a457d; stop-opacity: 1" />
            <stop offset="100%" style="stop-color: #9565ae; stop-opacity: 1" />
          </linearGradient>
        </defs>
        <rect width="800" height="800" fill="url(#gradient1)" />
      </svg>
    </div>
    <div
      class="relative bg-white bg-opacity-5 backdrop-blur-lg p-8 rounded-xl shadow-2xl w-full max-w-md md:block hidden"
    >
      <div class="flex justify-center mb-4">
        <font-awesome-icon :icon="['far', 'circle-user']" size="3x"/>
      </div>

      <h2 class="text-2xl font-bold uppercase mb-6 text-center">Iniciar Sesión</h2>
      <form @submit.prevent="handleSubmit">
        <div class="mb-4 relative">
          <label for="email" class="sr-only">Correo Electrónico</label>
          <font-awesome-icon
            :icon="['fas', 'user']"
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
        <button
          type="submit"
          class="w-full bg-yellow-500 text-indigo-500 py-2 rounded-lg hover:bg-indigo-500 hover:text-white transition duration-300"
        >
          Iniciar Sesión
        </button>
      </form>
      <p class="mt-4 text-center">
        ¿No tienes una cuenta?
        <a href="/register" class="text-yellow-500 hover:underline">Regístrate</a>
      </p>
    </div>
  </div>
</template>
yarn add @fortawesome/free-regular-svg-icons @types/fontawesome__free-regular-svg-icons
