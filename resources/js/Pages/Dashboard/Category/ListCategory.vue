<template>
  <!-- <p>{{ data }}</p> -->

  <Table :data="data" :columns="columns"></Table>
  <h1 class="flex justify-center items-center mt-10 font-bold text-2xl mb-10">
    Tabla manual Creada
  </h1>

  <table class="w-full">
    <thead>
      <th>Id</th>
      <th>Title</th>
      <th>Slug</th>
      <th>Actions</th>
    </thead>
    <tbody>
      <tr v-for="i in data" :key="i.id">
        <td class="p-2">{{ i.id }}</td>
        <td class="p-2">{{ i.title }}</td>
        <td class="p-2">{{ i.slug }}</td>
        <td class="p-2">
          <Link :href="route('updateCategory', i.id)" class="colorActions"> Editar</Link>
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script setup>
import Table from "@/Components/Table.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

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
<style scoped>
th {
  background-color: #1f2937;
  color: #fff;
  border: 2px solid #fff;
  margin: 2px;
  padding: 10px;
}
td {
  border: 2px solid #fff;
  text-align: center;
}

td {
  background-color: rgb(74, 192, 246);
}

.colorActions {
  color: rgb(178, 39, 39);
}
.colorActions:hover {
  background-color: #fff;
  padding: 5px;
  border-radius: 10px;
}
</style>
