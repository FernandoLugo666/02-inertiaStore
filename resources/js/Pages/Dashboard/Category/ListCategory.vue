<template>
  <!-- <p>{{ data }}</p> -->

  <Table :data="data" :columns="columns"></Table>
</template>
<script setup>
import Table from "@/Components/Table.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineOptions({
  layout: AppLayout,
});

const props = defineProps({
  data: {
    type: Array,
  },
});

const columns = [
  {
    type: "field",
    title: "titulo",
    field: "title",
  },
  {
    type: "field",
    title: "Slug",
    field: "slug",
  },
  {
    type: "action",
    title: "Acciones",
    elements: [
      {
        type: "link",
        title: "Editar",
        icon: "pi-pencil",
        href: "/category/update-category/",
        color: "red",
      },
    ],
  },
];
</script>
