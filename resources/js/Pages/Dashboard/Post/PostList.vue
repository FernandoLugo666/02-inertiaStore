<template>
  <Title title="Lista de posts" />
  <Table :data="data" :columns="columns" />

  <div>
    <!-- Aqui coloco las emisiones de mi componente para hacer una u otra oacción     -->
    <CustomConfirm
      message="¿Estás seguro de que deseas eliminar este post?"
      header="Eliminar Post"
      :showDialog="showDialogsConfirm"
      @confirm="confirmDelete"
      @cancel="cancelDelete"
    />
  </div>
</template>

<script setup>
import CustomConfirm from "@/Components/CustomConfirm.vue";
import Table from "@/Components/Table.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

defineOptions({
  layout: AppLayout,
});

const props = defineProps({
  data: Array,
});

const showDialogsConfirm = ref(false);
const selectRow = ref(null);

//Funcion para borrar
function deletePost(row) {
  showDialogsConfirm.value = true;
  selectRow.value = row;
  console.log(selectRow.value);
  console.log(selectRow.value.id);
}

//Ejecutar cuando el usuario confirme la eliminación.

function confirmDelete() {
  if (!selectRow.value) return;
  router.delete(route("deletePost", selectRow.value.id), {
    onSuccess: () => {
      console.log("Post eliminado correctamente");
    },
  });
  showDialogsConfirm.value = false;
}

function cancelDelete() {
  showDialogsConfirm.value = false;
}

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
      {
        type: "button",
        title: "Eliminar",
        icon: "pi pi-trash",
        color: "red",
        onClick: (row) => deletePost(row),
      },
    ],
  },
];
</script>
