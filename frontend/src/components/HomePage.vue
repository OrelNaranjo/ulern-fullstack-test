<script setup lang="ts" name="Home Page">
import { useUserStore } from '../stores/userStore'

const fullname =
  useUserStore().profile?.first_name + ' ' + useUserStore().profile?.last_name
</script>

<template>
  <div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Bienvenido, {{ fullname }}!</h1>
    <p>
      Este es tu panel de control. Aquí puedes ver y gestionar tu información.
    </p>
  </div>
</template>
