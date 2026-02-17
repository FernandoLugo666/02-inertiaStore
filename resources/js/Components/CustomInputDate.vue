<template>
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

const internalValue = ref(props.modelValue);

watch(internalValue, (newValue) => {
  if (!newValue) {
    emit("update:modelValue", null);
    return;
  }

  const formatted = newValue.toISOString().split("T")[0];
  emit("update:modelValue", formatted);
});
</script>
