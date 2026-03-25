<template>
  <div class="flex items-end justify-end">
    <Link :href="route('crearContacto')">
      <Button label="Crear Contacto" />
    </Link>
  </div>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Button } from "primevue";

defineOptions({
  layout: AppLayout,
});
</script>
