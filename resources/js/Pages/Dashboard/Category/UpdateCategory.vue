<template>
  <Title title="Actualizar Categoria" />

  <form @submit.prevent="submit">
    <div class="mt-10">
      <CustomInputField label="Titulo" v-model="form.title" />
    </div>

    <div class="mt-10">
      <CustomInputField label="Slug" v-model="form.slug" />
    </div>

    <div class="mt-10">
      <CustomInputField label="Text" v-model="form.text" />
    </div>

    <div class="mt-5 flex justify-center items-center">
      <Button label="Actualizar" type="submit" />
    </div>
  </form>

  <Toast position="top-center" group="tc" />
</template>
<script setup>
import CustomInputField from "@/Components/CustomInputField.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { router, useForm } from "@inertiajs/vue3";
import Button from "primevue/button";
import Toast from "primevue/toast";
import { useToast } from "primevue";

const toast = useToast();

const props = defineProps({
  data: {
    type: Object,
    required: true,
  },
});

defineOptions({
  layout: AppLayout,
});

const form = useForm({
  title: props.data.title ?? "",
  slug: props.data.slug ?? "",
  text: props.data.text ?? "",
});

function submit() {
  form.put(route("updateCategory", props.data.id), {
    onSuccess: () => {
      toast.add({
        group: "tc",
        severity: "success",
        summary: "Éxito",
        detail: "Categoría actualizada correctamente",
        life: 3000,
      });

      setTimeout(() => {
        router.visit(route("listCategory"));
      }, 3000);
    },
  });
}
</script>
