<template>
  <footer class="p-6 text-center footer">
    <div class="container mx-auto">
      <div class="flex justify-center space-x-6 mb-2">
        <a
          href="https://github.com/OrelNaranjo"
          target="_blank"
          class="hover:text-fuchsia-700"
        >
          <font-awesome-icon :icon="['fab', 'github']" size="2x" />
        </a>
        <a
          href="https://linkedin.com"
          target="_blank"
          class="hover:text-blue-700"
        >
          <font-awesome-icon :icon="['fab', 'linkedin']" size="2x" />
        </a>
      </div>
      <p class="mb-1 text-xs">Desarrollado por Orel Naranjo</p>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
.footer {
  background-color: var(--color-background-soft);
  color: var(--color-text);
}
</style>
