<template>
  <div>
    <div>
      <FloatLabel>
        <DatePicker
          v-model="internalValue"
          :disabled="disabled"
          showIcon
          iconDisplay="input"
        />

        <label>
          {{ label }}
          <span v-if="required" class="text-red-500 font-bold">*</span>
        </label>
      </FloatLabel>
    </div>
    <Message v-if="invalid" class="mt-2" severity="error" closable>
      {{ invalid }}
    </Message>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import FloatLabel from "primevue/floatlabel";
import DatePicker from "primevue/datepicker";
import Message from "primevue/message";

const props = defineProps({
  modelValue: {
    type: [String, Date, null],
    default: null,
  },
  label: {
    type: String,
    required: true,
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  required: {
    type: Boolean,
    default: false,
  },
  invalid: {
    type: String,
  },
});

const emit = defineEmits(["update:modelValue"]);

const internalValue = ref(null);

// Cuando el padre cambie el valor (ej. al cargar edición)
watch(
  () => props.modelValue,
  (newValue) => {
    if (!newValue) {
      internalValue.value = null;
      return;
    }

    // Si viene como string tipo "2026-02-17"
    internalValue.value = typeof newValue === "string" ? new Date(newValue) : newValue;
  },
  { immediate: true }
);

// Cuando el usuario cambie la fecha en el picker
watch(internalValue, (newValue) => {
  if (!newValue) {
    emit("update:modelValue", null);
    return;
  }

  const formatted = newValue.toISOString().split("T")[0];
  emit("update:modelValue", formatted);
});
</script>
