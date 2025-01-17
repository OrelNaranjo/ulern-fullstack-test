<script setup lang="ts">
import { computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import ProfileComponent from './templates/ProfileComponent.vue'

const route = useRoute()
const router = useRouter()

const breadcrumbs = computed(() => {
  const paths = route.path.split('/').filter(Boolean)
  const breadcrumbPaths = paths.map((path, index) => {
    const fullPath = '/' + paths.slice(0, index + 1).join('/')
    const routeMatch = router.resolve(fullPath)
    const name: string =
      (routeMatch.meta.title as string) ||
      path.charAt(0).toUpperCase() + path.slice(1)
    return {
      name: name.replace(/-/g, ' '),
      path: fullPath,
    }
  })
  breadcrumbPaths.unshift({ name: 'Dashboard', path: '/' })
  return breadcrumbPaths
})

const navigateTo = (path: string) => {
  router.push(path)
}
</script>

<template>
  <header class="p-4 flex justify-between items-center header">
    <div class="flex items-center space-x-4">
      <img src="../assets/logo.svg" alt="Logo" class="h-8" />
      <nav class="breadcrumb flex space-x-2 text-sm">
        <span
          v-for="(breadcrumb, index) in breadcrumbs"
          :key="index"
          class="breadcrumb-item"
        >
          <span v-if="index > 0" class="mx-2">/</span>
          <span
            @click="navigateTo(breadcrumb.path)"
            class="cursor-pointer hover:underline"
          >
            {{ breadcrumb.name }}
          </span>
        </span>
      </nav>
    </div>
    <ProfileComponent />
  </header>
</template>

<style lang="scss" scoped>
.header {
  background-color: var(--color-background-soft);
  color: var(--color-text);
}

.breadcrumb-item {
  display: flex;
  align-items: center;
}

.breadcrumb-item span {
  color: var(--color-text);
}

.breadcrumb-item span:hover {
  color: var(--color-heading);
}

.breadcrumb-item .mx-2 {
  margin-left: 0.5rem;
  margin-right: 0.5rem;
}
</style>
