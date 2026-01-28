<template>
  <div>
    <FloatLabel>
      <InputText
        v-model="internalValue"
        :disabled="disabled"
        :class="['w-full', { 'font-bold': disabled }]"
      />
      <label
        >{{ label }} <span v-if="required" class="text-red-500" font-bold> *</span>
      </label>
    </FloatLabel>

    <Message v-if="invalid" class="mt-2" severity="error" closable>
      {{ invalid }}</Message
    >
  </div>
</template>
<script setup>
import Message from "primevue/message";
import FloatLabel from "primevue/floatlabel";
import InputText from "primevue/inputtext";

import { ref, watch } from "vue";
const props = defineProps({
  modelValue: {
    type: [String, Number, null],
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

const internalValue = ref(props.modelValue);

watch(
  () => props.modelValue,
  (newValue) => {
    internalValue.value = newValue;
  }
);

watch(internalValue, (newValue) => {
  emit("update:modelValue", newValue);
});
</script>
