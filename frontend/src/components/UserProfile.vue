<script setup lang="ts">
import { ref, onMounted, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useUserStore } from '../stores/userStore'
import { formatPhoneNumber } from '../utils/FormatPhoneNumber'
import EditProfile from './EditProfile.vue'
import LoadingComponent from './templates/LoadingComponent.vue'

const userStore = useUserStore()
const userProfile = ref(userStore.profile)
const errorMessage = ref('')
const isEditing = ref(false)

const router = useRouter()

onMounted(async () => {
  try {
    await userStore.fetchUserProfile()
    userProfile.value = userStore.profile
  } catch (error) {
    console.error('Failed to fetch user profile:', error)
    errorMessage.value =
      'Error al obtener el perfil del usuario. Por favor, intenta nuevamente.'
    router.push('/login')
  }
})

watch(
  () => userStore.profile,
  newProfile => {
    userProfile.value = newProfile
  },
)

const openEditProfile = () => {
  isEditing.value = true
  router.push('/profile/edit')
}

const closeEditProfile = () => {
  isEditing.value = false
  router.push('/profile')
}

const handleProfileUpdated = () => {
  isEditing.value = false
}
</script>

<template>
  <div class="p-8">
    <div v-if="errorMessage" class="text-red-500">{{ errorMessage }}</div>
    <div
      v-else-if="userProfile"
      class="bg-gray-50 shadow-md rounded-lg p-6 flex"
    >
      <div
        class="w-24 h-32 rounded-lg border-2 border-gray-300 bg-gray-300 mr-6 flex-shrink-0 flex items-center justify-center bg-cover bg-center"
      >
        <font-awesome-icon
          :icon="['fas', 'user']"
          class="text-gray-500 text-4xl"
        />
      </div>
      <div class="flex-grow">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold color-text">
            Información del Perfil
          </h2>
          <button
            @click="openEditProfile"
            class="text-gray-500 cursor-pointer hover:text-gray-700"
          >
            <p>Editar Perfil</p>
            <font-awesome-icon :icon="['fas', 'user-pen']" />
          </button>
        </div>
        <p class="mb-2 color-text">
          <strong>Nombre:</strong> {{ userProfile.first_name }}
          {{ userProfile.last_name }}
        </p>
        <p class="mb-2 color-text">
          <strong>Correo Electrónico:</strong> {{ userProfile.email }}
        </p>
        <p class="mb-2 color-text">
          <strong>Teléfono:</strong>
          {{ formatPhoneNumber(userProfile.phone_number) }}
        </p>
      </div>
    </div>
    <div v-else class="flex flex-col justify-center items-center">
      <LoadingComponent />
    </div>
    <transition name="fade-scale">
      <div
        v-if="isEditing"
        class="fixed inset-0 flex items-center justify-center z-50"
      >
        <div class="bg-gray-100 shadow-lg p-8 rounded-lg w-1/2 relative">
          <button @click="closeEditProfile" class="absolute top-4 right-4">
            <font-awesome-icon :icon="['fas', 'times']" />
          </button>
          <EditProfile @profile-updated="handleProfileUpdated" />
        </div>
      </div>
    </transition>
  </div>
</template>

<style scoped>
.color-text {
  color: var(--color-text-softer);
}
.fade-scale-enter-active,
.fade-scale-leave-active {
  transition:
    opacity 0.5s ease,
    transform 0.5s ease;
}
.fade-scale-enter {
  opacity: 0;
  transform: scale(0.9);
}
.fade-scale-enter-to {
  opacity: 1;
  transform: scale(1);
}
.fade-scale-leave {
  opacity: 1;
  transform: scale(1);
}
.fade-scale-leave-to {
  opacity: 0;
  transform: scale(0.9);
}
</style>
