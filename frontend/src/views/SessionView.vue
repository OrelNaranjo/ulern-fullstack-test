<script setup lang="ts">
import { useRoute } from 'vue-router'
import Background from '../components/templates/BackgroundComponent.vue'
import LoginForm from '../components/auth/LoginForm.vue'
import RegisterForm from '../components/auth/RegisterForm.vue'
import { computed } from 'vue'
import type { Component } from 'vue'

const route = useRoute()

const componentMap: { [key: string]: Component } = {
  '/auth/login': LoginForm,
  '/auth/register': RegisterForm,
}

const currentComponent = computed<Component>(
  () => componentMap[route.path] || LoginForm,
)
</script>

<template>
  <main>
    <div
      class="min-h-screen flex flex-col items-center justify-center p-4 text-white"
    >
      <Background />
      <component :is="currentComponent" />
    </div>
  </main>
</template>
