<template>
  <FloatLabel>
    <Select
      :modelValue="modelValue"
      @update:modelValue="updateValue"
      :options="options"
      :optionLabel="optionLabel"
      :placeholder="placeholder"
      :class="['w-full', { 'font-bold': disabled }]"
    />
    <label>{{ label }} <span v-if="required" class="text-red-500">*</span></label>
  </FloatLabel>
</template>
<script setup>
import { FloatLabel, Select } from "primevue";

const props = defineProps({
  modelValue: {
    type: [Object, String, Number, null],
    default: null,
  },

  options: {
    type: Array,
    required: true,
  },
  optionLabel: {
    type: String,
    default: "name",
  },
  placeholder: {
    type: String,
    default: "",
  },
  label: String,
  required: {
    type: Boolean,
    default: false,
  },
});

const emit = defineEmits(["update:modelValue"]);

const updateValue = (value) => {
  emit("update:modelValue", value);
};
</script>
