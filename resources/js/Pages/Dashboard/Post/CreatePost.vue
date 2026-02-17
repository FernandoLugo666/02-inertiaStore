<template>
  <Title title="Crear Post" />
  <form @submit.prevent="submit">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-4 mt-6">
        <CustomInputField
          v-model="form.title"
          label="Titulo del Post"
          required
          :invalid="errorField('title')"
        />
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4 mt-6">
        <CustomInputField
          v-model="form.slug"
          label="Slug"
          required
          :invalid="errorField('slug')"
        />
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4 mt-6">
        <CustomInputDate v-model="form.date" label="Ingresa una fecha" />
      </div>

      <div class="col-sm-12 col-md-6 col-lg-4 mt-5">
        <CustomInputField
          v-model="form.description"
          label="Descripción"
          required
          :invalid="errorField('description')"
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
});
function errorField(key) {
  return form.errors[key] ?? null;
}

function submit() {
  form.post(route("createPost"));
}
</script>
