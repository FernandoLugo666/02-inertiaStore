<template>
  <Title title="Lista de posts" />
  <!-- {{ data }} -->
  <Table :data="data" :columns="columns" />
</template>

<script setup>
import Table from "@/Components/Table.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineOptions({
  layout: AppLayout,
});

const props = defineProps({
  data: Array,
});

const columns = [
  {
    type: "field",
    title: "Titulo",
    field: "title",
  },
  {
    type: "field",
    title: "Slug",
    field: "slug",
  },
  {
    type: "field",
    title: "Fecha",
    field: "date",
  },
  {
    type: "field",
    title: "Descripción",
    field: "description",
  },
  {
    type: "action",
    title: "Acciones",
    elements: [
      {
        type: "link",
        title: "Actualizar",
        icon: "pi pi-pencil",
        href: "/post/update-post/",
        color: "blue",
      },
    ],
  },
];
</script>
