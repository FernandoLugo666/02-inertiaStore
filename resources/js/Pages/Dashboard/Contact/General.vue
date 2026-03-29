<template>
  <p>{{ JSON.stringify(data, null, 2) }}</p>
  <div class="flex items-end justify-end">
    <Link :href="route('crearContacto')">
      <Button label="Crear Contacto" />
    </Link>
  </div>

  <div>
    <Table :data="data" :columns="columns" />
  </div>
</template>
<script setup>
import Table from "@/Components/Table.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Button } from "primevue";

const props = defineProps({
  data: Array,
});

defineOptions({
  layout: AppLayout,
});

const columns = [
  {
    type: "field",
    title: "Subject",
    field: "subject",
  },
  {
    type: "field",
    title: "Message",
    field: "message",
  },
  {
    type: "field",
    title: "Type",
    field: "type",
  },
  {
    type: "action",
    title: "Acciones",
    elements: [
      {
        type: "link",
        title: "Editar",
        icon: "pi pi-pencil",
        href: "/contact/update-contact/",
        color: "red",
      },
    ],
  },
];
</script>
