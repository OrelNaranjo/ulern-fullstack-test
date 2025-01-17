<script setup lang="ts">
import Menu from '../components/DashboardMenu.vue'
import Header from '../components/DashboardHeader.vue'
import Footer from '../components/DashboardFooter.vue'
</script>

<template>
  <div class="flex flex-col h-screen">
    <Header></Header>
    <div class="flex flex-1 overflow-hidden">
      <Menu></Menu>
      <main class="flex-1 p-4 overflow-auto">
        <router-view></router-view>
      </main>
    </div>
    <Footer></Footer>
  </div>
</template>
