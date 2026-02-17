<template>
  <Title title="Tablas" />
  <h1 class="fle justify-center items-center mt-10 font-bold text-2xl mb-10">
    Tabla Usando componente Table
  </h1>
  <div class="table-container">
    <Table :data="data" :columns="columns"></Table>
  </div>
  <h1 class="flex justify-center items-center mt-10 font-bold text-2xl mb-10">
    Tabla manual Creada
  </h1>

  <div class="table-container">
    <table class="w-full">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>

        <tr></tr>
      </thead>

      <tbody>
        <tr v-for="i in data" :key="i.id">
          <td class="p-2">{{ i.id }}</td>
          <td class="p-2">{{ i.title }}</td>
          <td class="p-2">{{ i.slug }}</td>
          <td class="p-2">
            <Link :href="route('updateCategory', i.id)" class="colorActions">
              Editar</Link
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!--  -->
  <h1 class="flex justify-center items-center mt-10 font-bold text-2xl mb-10">
    Tabla manual con paginado
  </h1>

  <div class="table-container">
    <table class="w-full">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="i in dataPaginada.data" :key="i.id">
          <td class="p-2">{{ i.id }}</td>
          <td class="p-2">{{ i.title }}</td>
          <td class="p-2">{{ i.slug }}</td>
          <td class="p-2">
            <Link :href="route('updateCategory', i.id)" class="colorActions">
              Editar</Link
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Paginado a mano -->
  <template v-for="l in dataPaginada.links" :key="l.label">
    <Link v-if="l.url" :href="l.url" class="px-2 py-1 space-x-4">
      <span v-html="l.label"></span>
    </Link>

    <span v-else class="px-2 py-1 text-gray-400" v-html="l.label" />
  </template>

  <h1 class="flex justify-center items-center mt-10 font-bold text-2xl mb-10">
    Tabla manual con paginado de Vue
  </h1>

  <div class="table-container">
    <!--Paginado con CFOmponente de vue-->

    <Table :data="dataperPage.data" :columns="columns" paginator />
  </div>
</template>

<script setup>
import Table from "@/Components/Table.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const successMessage = ref(null);

watch(
  () => page.props.flash.success,
  (val) => {
    successMessage.value = val;
  },
  { immediate: true }
);

defineOptions({
  layout: AppLayout,
});

const props = defineProps({
  data: {
    type: Array,
  },
  dataPaginada: {
    type: Object,
  },
  dataperPage: {
    type: Object,
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
      {
        type: "button",
        title: "Eliminar",
        icon: "pi-trash",
        color: "red",
        onClick: (row) => {
          router.delete(`/category/delete-category/${row.id}`);
        },
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
