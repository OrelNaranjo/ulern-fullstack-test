<template>
  <div class="absolute inset-0 overflow-hidden">
    <svg
      class="w-full h-full transform rotate-45 scale-[2.5]"
      xmlns="http://www.w3.org/2000/svg"
      preserveAspectRatio="none"
    >
      <defs>
        <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%">
          <stop offset="0%" style="stop-color: #2657eb; stop-opacity: 1" />
          <stop offset="30%" style="stop-color: #4389a2; stop-opacity: 1" />
          <stop offset="70%" style="stop-color: #9565ae; stop-opacity: 1" />
          <stop offset="100%" style="stop-color: #5c258d; stop-opacity: 1" />
        </linearGradient>
      </defs>
      <rect width="100%" height="100%" fill="url(#gradient1)" />
    </svg>
  </div>
</template>

<style scoped>
.overflow-hidden {
  overflow: hidden;
}
.absolute {
  position: absolute;
  width: 100vw;
  height: 100vh;
}
</style>
