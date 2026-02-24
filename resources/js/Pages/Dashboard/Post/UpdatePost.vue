<template>
  <!-- {{ data }} -->
  <Title title="Actualizar Post" />

  <form @submit.prevent="submit">
    <div class="grid mt-5">
      <!-- Aqui  en pantalla mediana de las 12 columnas ocupo 6 osea caben 2       -->
      <!-- Aqui  en pantalla chica de las 12 columnas ocupo 12 osea cabe 1       -->
      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputField
          v-model="form.title"
          label="Titulo"
          required
          :invalid="errorField('title')"
        />
      </div>

      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputField
          v-model="form.slug"
          label="Slug"
          required
          :invalid="errorField('slug')"
        />
      </div>

      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputDate
          v-model="form.date"
          label="Fecha"
          required
          :invalid="errorField('date')"
        />
      </div>

      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputField
          v-model="form.description"
          label="Descripción"
          required
          :invalid="errorField('description')"
        />
      </div>

      <div v-if="props.data?.image" class="col-12 md:col-6 lg:col-4 p-3">
        <p class="mb-2 text-gray-500">Imagen actual:</p>
        <img
          :src="`/storage/${props.data.image}`"
          class="w-20rem border-round shadow-2"
        />
      </div>
    </div>

    <div class="mt-5 flex justify-content-center">
      <Button label="Actualizar" type="submit" />
    </div>
  </form>
</template>

<script setup>
import CustomInputDate from "@/Components/CustomInputDate.vue";
import CustomInputField from "@/Components/CustomInputField.vue";
import CustomInputImage from "@/Components/CustomInputImage.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import Button from "primevue/button";

const props = defineProps({
  data: Object,
});

defineOptions({
  layout: AppLayout,
});

const form = useForm({
  title: props.data?.title || "",
  slug: props.data?.slug || "",
  date: props.data?.date || "",
  description: props.data?.description || "",
});

function errorField(key) {
  return form.errors[key] || null;
}

function submit() {
  form.post(route("updatePost", props.data.id), {
    onSuccess: () => {
      console.log("Se actualizó el Post");
    },
    onError: () => {
      console.log("Ocurrió un problema");
    },
  });
}
</script>
