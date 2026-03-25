<template>
  <Title title="Crear Contacto" />
  <div class="mt-10">
    <form @submit.prevent="submit">
      <div class="grid">
        <div class="col-12 lg:col-4 md:col-6 sm:col-12">
          <CustomInputField v-model="form.subject" label="Subject" required />
        </div>
        <div class="col-12 lg:col-4 md:col-6 sm:col-12">
          <CustomInputField v-model="form.message" label="Message" required />
        </div>

        <div class="col-12 lg:col-4 md:col-6 sm:col-12">
          <CustomSelectField
            v-model="form.type"
            :options="items"
            label="Selecciona una opción"
            required
          />
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import CustomInputField from "@/Components/CustomInputField.vue";
import CustomSelectField from "@/Components/CustomSelectField.vue";
import Title from "@/Components/Title.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
defineOptions({
  layout: AppLayout,
});

const items = ref([{ name: "company" }, { name: "person" }]);
const form = useForm({
  subject: "",
  message: "",
  type: "",
});
</script>
