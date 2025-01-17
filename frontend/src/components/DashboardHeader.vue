<script setup lang="ts">
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import ProfileComponent from './templates/ProfileComponent.vue'

const route = useRoute()

const pageTitle = computed(() => {
  return route.meta.title || route.name || 'Dashboard'
})
</script>

<template>
  <header class="bg-gray-900 text-white p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">{{ pageTitle }}</h1>
    <ProfileComponent />
  </header>
</template>
