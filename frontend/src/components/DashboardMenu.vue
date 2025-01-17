<script setup lang="ts">
import { computed, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '../stores/userStore'

const isCollapsed = ref(false)
const router = useRouter()
const userStore = useUserStore()

const toggleMenu = () => {
  isCollapsed.value = !isCollapsed.value
}

const logout = async () => {
  await userStore.logout()
  router.push('/login')
}

const chevronIcon = computed(() =>
  isCollapsed.value ? 'chevron-right' : 'chevron-left',
)
</script>

<template>
  <aside
    :class="{ 'w-18': isCollapsed, 'w-48': !isCollapsed }"
    class="flex flex-col transition-width duration-300"
  >
    <button @click="toggleMenu" class="p-2 focus:outline-none">
      <font-awesome-icon :icon="['fas', chevronIcon]" />
    </button>
    <nav class="flex-1 p-4">
      <ul>
        <li class="mb-3 ps-2">
          <router-link
            to="/"
            class="py-2 px-4 rounded hover:bg-gray-700 flex items-center"
          >
            <font-awesome-icon :icon="['fas', 'tachometer-alt']" class="mr-2" />
            <span v-if="!isCollapsed">Dashboard</span>
          </router-link>
        </li>
        <li class="mb-3 ps-2">
          <router-link
            to="/profile"
            class="py-2 px-4 rounded hover:bg-gray-700 flex items-center"
          >
            <font-awesome-icon :icon="['fas', 'user']" class="mr-2" />
            <span v-if="!isCollapsed">Perfil</span>
          </router-link>
        </li>
        <li class="mb-3 ps-2">
          <button
            @click="logout"
            class="py-2 px-4 rounded hover:bg-gray-700 flex items-center w-full text-left"
          >
            <font-awesome-icon :icon="['fas', 'sign-out-alt']" class="mr-2" />
            <span v-if="!isCollapsed">Salir</span>
          </button>
        </li>
      </ul>
    </nav>
  </aside>
</template>

<style scoped>
aside {
  background-color: var(--color-background-soft);
  color: var(--color-text);
}
</style>
