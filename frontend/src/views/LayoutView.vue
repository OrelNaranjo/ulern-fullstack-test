<script setup lang="ts">
import Menu from '../components/DashboardMenu.vue'
import Header from '../components/DashboardHeader.vue'
import Footer from '../components/DashboardFooter.vue'
</script>

<template>
  <div class="flex h-screen">
    <Menu></Menu>
    <div class="flex-1 flex flex-col">
      <Header></Header>
      <main class="flex-1 p-4 overflow-auto">
        <router-view></router-view>
      </main>
      <Footer></Footer>
    </div>
  </div>
</template>
