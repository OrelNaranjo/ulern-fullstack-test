<script setup lang="ts">
import BackgroundComponent from '../components/templates/BackgroundComponent.vue'
</script>

<template>
  <div class="relative min-h-screen">
    <BackgroundComponent class="absolute inset-0 z-0" />
    <div
      class="relative flex flex-col items-center justify-center min-h-screen"
    >
      <img
        src="@/assets/404.svg"
        alt="404 No Encontrado"
        class="w-1/4 h-auto mb-8"
      />
      <p class="text-lg text-white mb-8">
        Lo sentimos, la página que estás buscando no existe.
      </p>
      <router-link
        to="/"
        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition duration-300"
      >
        Volver a la Página Principal
      </router-link>
    </div>
  </div>
</template>
