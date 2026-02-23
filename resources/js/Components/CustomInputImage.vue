<template>
  <div>
    <label class="block mb-2 font-semibold">
      {{ label }}
      <span v-if="required" class="text-red-500">*</span>
    </label>

    <!-- Dropzone -->
    <div
      class="border-2 rounded-lg p-6 text-center cursor-pointer transition hover:bg-gray-50 relative"
      :class="{ 'border-red-500': invalid }"
      @click="triggerInput"
      @dragover.prevent
      @drop.prevent="handleDrop"
    >
      <input
        ref="fileInput"
        type="file"
        accept="image/*"
        class="hidden"
        @change="handleFile"
      />

      <div v-if="!preview">
        <i class="pi pi-image text-4xl mb-2 block"></i>
        <p class="font-medium">Seleccionar archivo</p>
        <small class="text-gray-400"> Haz click o arrastra una imagen aquí </small>
      </div>

      <!-- Preview -->
      <div v-else class="relative flex items-center justify-center">
        <img :src="preview" class="h-32 object-cover rounded shadow" />

        <!-- Botón eliminar -->
        <button
          type="button"
          class="absolute top-0 right-0 bg-white rounded-full shadow p-1 hover:bg-red-500 hover:text-white transition"
          @click.stop="removeImage"
        >
          <i class="pi pi-times"></i>
        </button>
      </div>
    </div>

    <small v-if="invalid" class="text-red-500">
      {{ invalid }}
    </small>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";

const props = defineProps({
  modelValue: [File, String, null],
  label: String,
  required: Boolean,
  invalid: String,
});

const emit = defineEmits(["update:modelValue"]);

const preview = ref(null);
const fileInput = ref(null);

let objectUrl = null;

function triggerInput() {
  fileInput.value.click();
}

function handleFile(e) {
  const file = e.target.files[0];
  if (!file) return;

  emit("update:modelValue", file);
}

function handleDrop(e) {
  const file = e.dataTransfer.files[0];
  if (!file) return;

  emit("update:modelValue", file);
}

function removeImage() {
  emit("update:modelValue", null);
  preview.value = null;

  if (fileInput.value) {
    fileInput.value.value = null;
  }
}

watch(
  () => props.modelValue,
  (val) => {
    if (objectUrl) {
      URL.revokeObjectURL(objectUrl);
      objectUrl = null;
    }

    if (val instanceof File) {
      objectUrl = URL.createObjectURL(val);
      preview.value = objectUrl;
    } else if (typeof val === "string") {
      preview.value = val;
    } else {
      preview.value = null;
    }
  },
  { immediate: true }
);
</script>
