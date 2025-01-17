<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { AxiosError } from 'axios'
import axios from '../../axios'

const firstName = ref('')
const lastName = ref('')
const phoneNumber = ref('')
const email = ref('')
const password = ref('')
const passwordConfirmation = ref('')
const errorMessage = ref('')

const router = useRouter()

const handleSubmit = async () => {
  if (
    !firstName.value ||
    !lastName.value ||
    !phoneNumber.value ||
    !email.value ||
    !password.value ||
    !passwordConfirmation.value
  ) {
    errorMessage.value = 'Todos los campos son obligatorios.'
    return
  }

  if (password.value.length < 8) {
    errorMessage.value = 'La contraseña debe tener al menos 8 caracteres.'
    return
  }

  if (password.value !== passwordConfirmation.value) {
    errorMessage.value = 'Las contraseñas no coinciden.'
    return
  }

  try {
    await axios.post('/register', {
      first_name: firstName.value,
      last_name: lastName.value,
      phone_number: phoneNumber.value,
      email: email.value,
      password: password.value,
      password_confirmation: passwordConfirmation.value,
    })
    router.push('/login')
  } catch (error) {
    if (error instanceof AxiosError) {
      errorMessage.value =
        error.response?.data?.message ||
        'Error al registrarse. Por favor, verifica tus datos.'
    } else {
      errorMessage.value = 'Error desconocido al registrarse.'
    }
  }
}
</script>

<template>
  <div
    class="relative bg-white bg-opacity-5 backdrop-blur-lg p-8 rounded-xl shadow-2xl w-full max-w-md md:block hidden"
  >
    <div class="flex justify-center mb-4">
      <font-awesome-icon :icon="['fas', 'user-plus']" size="3x" />
    </div>

    <h2 class="text-2xl font-bold uppercase mb-6 text-center">Registro</h2>
    <form @submit.prevent="handleSubmit">
      <div class="mb-4 relative">
        <label for="firstName" class="sr-only">Nombre</label>
        <font-awesome-icon
          :icon="['fas', 'user']"
          class="absolute left-3 top-1/2 transform -translate-y-1/2"
        />
        <input
          type="text"
          id="firstName"
          v-model="firstName"
          placeholder="Nombre"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-white text-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
      <div class="mb-4 relative">
        <label for="lastName" class="sr-only">Apellido</label>
        <font-awesome-icon
          :icon="['fas', 'user']"
          class="absolute left-3 top-1/2 transform -translate-y-1/2"
        />
        <input
          type="text"
          id="lastName"
          v-model="lastName"
          placeholder="Apellido"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-white text-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
      <div class="mb-4 relative">
        <label for="phoneNumber" class="sr-only">Teléfono</label>
        <font-awesome-icon
          :icon="['fas', 'phone']"
          class="absolute left-3 top-1/2 transform -translate-y-1/2"
        />
        <input
          type="text"
          id="phoneNumber"
          v-model="phoneNumber"
          placeholder="Teléfono"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-white text-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
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
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent placeholder-white text-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
      <div class="mb-4 relative">
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
      <div class="mb-6 relative">
        <label for="passwordConfirmation" class="sr-only"
          >Confirmar Contraseña</label
        >
        <font-awesome-icon
          :icon="['fas', 'lock']"
          class="absolute left-3 top-1/2 transform -translate-y-1/2"
        />
        <input
          type="password"
          id="passwordConfirmation"
          v-model="passwordConfirmation"
          placeholder="Confirmar Contraseña"
          class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-md bg-transparent text-white placeholder-white focus:outline-none focus:ring focus:border-indigo-300"
          required
        />
      </div>
      <button
        type="submit"
        class="w-full bg-yellow-500 text-indigo-500 py-2 rounded-lg hover:bg-indigo-500 hover:text-white transition duration-300"
      >
        Registrarse
      </button>
      <p v-if="errorMessage" class="mt-4 text-center text-red-500">
        {{ errorMessage }}
      </p>
    </form>
    <p class="mt-4 text-center">
      ¿Ya tienes una cuenta?
      <a href="/login" class="text-yellow-500 hover:underline">Inicia Sesión</a>
    </p>
  </div>
</template>
