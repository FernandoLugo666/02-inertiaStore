<template>
  <div class="titleContainer">
    <h1 class="flex justify-center">{{ title }}</h1>
  </div>
</template>
<script setup>
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>
<style>
.titleContainer {
  background-color: var(--bg-general) !important;
  border-radius: 10px;
  margin: 5px;
  padding: 5px;
  color: #fff;
  font-size: 20px;
}
</style>
