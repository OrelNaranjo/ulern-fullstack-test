
<script setup lang="ts">
import { useRoute } from 'vue-router'
import Background from '../components/Background.vue'
import LoginForm from '../components/LoginForm.vue'
import RegisterForm from '../components/RegisterForm.vue'
import { computed } from 'vue'
import type { Component } from 'vue'

const route = useRoute()

const componentMap: { [key: string]: Component } = {
  '/login': LoginForm,
  '/register': RegisterForm,
}

const currentComponent = computed<Component>(() => componentMap[route.path] || LoginForm)
</script>

<template>
  <main>
    <div class="min-h-screen flex flex-col items-center justify-center p-4 text-white">
      <Background />
      <component :is="currentComponent" />
    </div>
  </main>
</template>
