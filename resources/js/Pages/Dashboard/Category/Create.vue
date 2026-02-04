<template>
  <Title title="Crear Categoria" />
  <form @submit.prevent="submit">
    <div class="mt-10 ml-5">
      <CustomInputField
        v-model="form.title"
        label="Titulo"
        :invalid="errorField('title')"
      />
    </div>
    <div class="mt-10 ml-5">
      <CustomInputField v-model="form.slug" label="Slug" :invalid="errorField('slug')" />
    </div>
    <div class="mt-10 ml-5">
      <CustomInputField
        v-model="form.prueba"
        label="Prueba"
        :invalid="errorField('prueba')"
      />
    </div>
    <Toast />
    <div class="flex justify-center items-center pt-5">
      <Button label="Enviar" type="submit" />
    </div>
  </form>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import CustomInputField from "@/Components/CustomInputField.vue";
import { useForm } from "@inertiajs/vue3";
import Button from "primevue/button";
import Title from "@/Components/Title.vue";
import Toast from "primevue/toast";
import { useToast } from "primevue";

const toast = useToast();

defineOptions({
  layout: AppLayout,
});

const form = useForm({
  title: "",
  slug: "",
  prueba: "",
});

function submit() {
  form.post(route("create"));
}

function errorField(key) {
  return this.form.errors[key] ?? null;
}
</script>
