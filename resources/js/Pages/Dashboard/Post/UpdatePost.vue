<template>
  <!-- <p>{{ data }}</p> -->
  <form @submit.prevent="submit">
    <div class="row">
      <div class="mt-10">
        <CustomInputField
          v-model="form.title"
          label="Titulo"
          required
          :invalid="errorField('title')"
        />
      </div>
      <div class="mt-10">
        <CustomInputField
          v-model="form.slug"
          label="Slug"
          required
          :invalid="errorField('slug')"
        />
      </div>
      <div class="mt-10">
        <CustomInputDate
          v-model="form.date"
          label="Slug"
          required
          :invalid="errorField('date')"
        />
      </div>
      <div class="mt-10">
        <CustomInputField
          v-model="form.description"
          label="Descripción"
          required
          :invalid="errorField('description')"
        />
      </div>
    </div>
    <div class="mt-10 flex justify-center items-center">
      <Button label="Actualizar" type="submit" />
    </div>
  </form>
</template>
<script setup>
import CustomInputDate from "@/Components/CustomInputDate.vue";
import CustomInputField from "@/Components/CustomInputField.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { Button } from "primevue";

const props = defineProps({
  data: Array,
});

defineOptions({
  layout: AppLayout,
});

const form = useForm({
  title: props.data.title || "",
  slug: props.data.slug || "",
  date: props.data.date || "",
  description: props.data.description || "",
});

function errorField(key) {
  return form.errors[key] || null;
}

function submit() {
  form.put(route("updatePost", props.data.id), {
    onSucces: () => {
      console.log("Se actualizó el Post");
    },
    onError: () => {
      console.log("Ocurrió un problema");
    },
  });
}
</script>
