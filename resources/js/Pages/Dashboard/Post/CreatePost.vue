<template>
  <Title title="Crear Post" />
  <form @submit.prevent="submit">
    <div class="grid mt-5">
      <div class="col-12 md:col-6 lg:col-4 p-3 m">
        <CustomInputField
          v-model="form.title"
          label="Titulo del Post"
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
        <CustomInputDate v-model="form.date" label="Ingresa una fecha" />
      </div>

      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputField
          v-model="form.description"
          label="Descripción"
          required
          :invalid="errorField('description')"
        />
      </div>
      <div class="col-12 md:col-6 lg:col-4 p-3">
        <CustomInputImage
          v-model="form.image"
          label="Imagen"
          required
          :invalid="errorField('image')"
        />
      </div>
    </div>
    <div class="mt-6 flex justify-center items-center">
      <Button label="Crear Post" type="submit" />
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
import { Button } from "primevue";

defineOptions({
  layout: AppLayout,
});

const form = useForm({
  title: "",
  slug: "",
  date: "",
  description: "",
  image: null,
});
function errorField(key) {
  return form.errors[key] ?? null;
}

function submit() {
  form.post(route("createPost"), {
    _method: "put",
    forceFormData: true,

    onSuccess: () => {
      console.log("Se Creó el Post");
    },
    onError: () => {
      console.log("Ocurrió un problema");
    },
  });
}
</script>
