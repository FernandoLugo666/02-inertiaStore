<template>
  <p>{{ data }}</p>
  <hr />
  <Title title="Actualizar Contacto" />
  <form @submit.prevent="submit">
    <div class="grid mt-5">
      <div class="col-12 lg:col-4 md:col-6 sm:col-12">
        <CustomInputField v-model="form.subject" label="Subject" required />
      </div>
      <div class="col-12 lg:col-4 md:col-6 sm:col-12">
        <CustomInputField v-model="form.message" label="Message" required />
      </div>
      <div class="col-12 lg:col-4 md:col-6 sm:col-12">
        <CustomSelectField v-model="form.type" label="Type" :options="options" />
      </div>
    </div>
    <div class="flex justify-center items-center">
      <Button label="Actualizar contacto" type="submit" />
    </div>
  </form>
</template>

<script setup>
import CustomInputField from "@/Components/CustomInputField.vue";
import CustomSelectField from "@/Components/CustomSelectField.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { router, useForm } from "@inertiajs/vue3";
import { Button } from "primevue";

const props = defineProps({
  data: Object,
});

defineOptions({
  layout: AppLayout,
});

const form = useForm({
  subject: props.data.subject || "",
  message: props.data.message || "",
  type: props.data.type || "",
});

const options = [
  { name: "company", value: "company" },
  { name: "person", value: "person" },
];

function submit() {
  form.put(route("updateContact", props.data.id), {
    onSuccess: () => {
      console.log("Se enviaron los datos");

      setTimeout(() => {
        router.visit(route("generalTable")); // No refresca toda la pagina y preserva estados
        //window.location.href = route("generalTable"); // Aqui si recarga toda la página
      }, 3000);
    },
    onError: () => {
      console.log("No se pudo actualizar el contacto");
    },
  });
}
</script>
