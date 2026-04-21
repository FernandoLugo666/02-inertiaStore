<template>
  <p>{{ props.data.id }}</p>

  <Title title="Actualizar Compañia" />
  <form @submit.prevent="submit">
    <div class="grid">
      <div class="col-12 lg:col-12 md:col-6 sm:col-4 mt-5">
        <CustomInputField v-model="form.name" label="Nombre de la Compañia" />
      </div>
      <div class="col-12 lg:col-12 md:col-6 sm:col-4 mt-5">
        <CustomInputField v-model="form.identification" label="Identificación" />
      </div>
      <div class="col-12 lg:col-12 md:col-6 sm:col-4 mt-5">
        <CustomInputField v-model="form.email" label="Email" />
      </div>
    </div>

    <div class="flex justify-center mt-5">
      <Button label="Actualizar" type="submit" />
    </div>
  </form>
</template>

<script setup>
import CustomInputField from "@/Components/CustomInputField.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { Button } from "primevue";

defineOptions({
  layout: AppLayout,
});

const props = defineProps({
  data: Object,
});

const form = useForm({
  name: props.data.name,
  identification: props.data.identification,
  email: props.data.email,
});

function submit() {
  form.put(route("updateCompany", props.data.id), {
    onSuccess: () => {
      console.log("Datos enviados");

      setTimeout(() => {
        window.location.href = route("listCompany");
      }, 3000);
    },
    onError: () => {
      console.log("Error al enviar los datos");
    },
  });
}
</script>
