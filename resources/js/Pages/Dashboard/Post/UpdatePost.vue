<template>
  <Title title="Actualizar Post" />

  <form @submit.prevent="submit">
    <div class="grid mt-5">
      <!-- Título -->
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

      <!-- Slug -->
      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputField
          v-model="form.slug"
          label="Slug"
          required
          :invalid="errorField('slug')"
        />
      </div>

      <!-- Fecha -->
      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputDate
          v-model="form.date"
          label="Fecha"
          required
          :invalid="errorField('date')"
        />
      </div>

      <!-- Descripción -->
      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputField
          v-model="form.description"
          label="Descripción"
          required
          :invalid="errorField('description')"
        />
      </div>

      <!-- Imagen -->
      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputImage
          v-model="form.image"
          label="Imagen"
          required
          :invalid="errorField('image')"
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
  image: null,
});

function errorField(key) {
  return form.errors[key] || null;
}

function submit() {
  form.post(route("updatePost", props.data.id), {
    _method: "put",
    forceFormData: true,
    onSuccess: () => {
      console.log("Se actualizó el Post");
    },
    onError: () => {
      console.log("Ocurrió un problema");
    },
  });
}
</script>
