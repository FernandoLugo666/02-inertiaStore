<template>
  <Title title="Crear Compañia" />
  <div class="mt-5">
    <form @submit.prevent="submit">
      <div class="grid">
        <div class="col-12 lg:col-4 md:col-6 sm:col-12">
          <CustomInputField
            v-model="form.name"
            label="Nombre"
            :invalid="errorField('name')"
            required
          />
        </div>
        <div class="col-12 lg:col-4 md:col-6 sm:col-12">
          <CustomInputField
            v-model="form.identification"
            label="Identificación"
            :invalid="errorField('identification')"
            required
          />
        </div>
        <div class="col-12 lg:col-4 md:col-6 sm:col-12">
          <CustomInputField
            v-model="form.email"
            label="Email"
            :invalid="errorField('email')"
            required
          />
        </div>
      </div>

      <div class="flex items-center justify-center">
        <Button label="Crear" type="submit" :loading="isLoading" />
      </div>
    </form>
  </div>
</template>

<script setup>
import CustomInputField from "@/Components/CustomInputField.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { Button } from "primevue";
import { ref, watch } from "vue";

const isLoading = ref(false);

defineOptions({
  layout: AppLayout,
});
const form = useForm({
  name: "",
  identification: "",
  email: "",
});

function submit() {
  // Al enviar los datos carga
  isLoading.value = true;

  form.post(route("createCompany"), {
    onSuccess: () => {
      isLoading.value = false; // Si es succes, deja de cargar
      console.log("Se enviaron los datos de la compañia");
    },
    onError: () => {
      isLoading.value = true;
      console.log("Ocurrió un error al enviar los datos de la compañia");
    },
  });
}
function errorField(key) {
  return form.errors[key] || null;
}
//Watch para escuchar cambios en el formulario, si hay errores carga, si se teclea, deja de cargar para reintentar
watch(
  () => form.data(),
  () => {
    if (Object.keys(form.errors).length > 0) {
      isLoading.value = false;
    }
  },
  { deep: true } // dee:true hace que el watch escuche cambios intenros en el objeto
);
</script>
