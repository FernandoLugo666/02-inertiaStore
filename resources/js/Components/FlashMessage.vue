<template>
  <div
    v-if="message"
    class="relative mb-4 p-4 rounded flex items-center justify-between"
    :class="bgClass"
  >
    <span>{{ message }}</span>

    <button @click="message = null" class="ml-4 font-bold">✕</button>
  </div>
</template>

<script setup>
import { ref, watch, computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const message = ref(null);
const type = ref("success");

watch(
  () => page.props.flash,
  (flash) => {
    if (flash?.success) {
      message.value = flash.success;
      type.value = "success";
    } else if (flash?.error) {
      message.value = flash.error;
      type.value = "error";
    }
  },
  { immediate: true }
);

const bgClass = computed(() => {
  return type.value === "success"
    ? "bg-green-100 text-green-800"
    : "bg-red-100 text-red-800";
});
</script>
