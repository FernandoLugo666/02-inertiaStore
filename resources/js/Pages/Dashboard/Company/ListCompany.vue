<template>
  <div>
    <Link :href="route('createCompany')"> <Button label="Crear Compañia" /></Link>
  </div>

  <Title title="Lista de Compañias" />

  <Table :data="data" :columns="columns" />
</template>

<script setup>
import Table from "@/Components/Table.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import { Button } from "primevue";

defineOptions({
  layout: AppLayout,
});

const props = defineProps({
  data: Array,
});

const columns = [
  { type: "field", title: "Nombre de la compañía", field: "name" },
  {
    type: "action",
    title: "Acciones",
    elements: [
      {
        type: "link",
        title: "Editar",
        icon: "pi pi-pencil",
        color: "blue",
        href: "/company/update-company/",
      },
    ],
  },
];
</script>
