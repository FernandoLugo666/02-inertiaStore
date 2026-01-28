<template>
  <div class="app-layout">
    <Sidebar />

    <main class="content">
      <slot />
    </main>
  </div>
</template>

<script setup>
import Sidebar from "@/Pages/menu/Sidebar.vue";
</script>

<style scoped>
.app-layout {
  display: flex;
  min-height: 100vh;
}

.content {
  flex: 1;
  padding: 1rem;
  background-color: #f9fafb;
}
</style>
