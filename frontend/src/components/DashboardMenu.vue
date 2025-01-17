<template>
  <aside class="w-64 bg-gray-800 text-white flex flex-col">
    <div class="p-4">
      <h1 class="text-2xl font-bold">Menu</h1>
    </div>
    <nav class="flex-1 p-4">
      <ul>
        <li class="mb-2">
          <router-link
            to="/dashboard"
            class="block py-2 px-4 rounded hover:bg-gray-700"
            >Dashboard</router-link
          >
        </li>
      </ul>
    </nav>
  </aside>
</template>
