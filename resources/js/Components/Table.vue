<template>
  <DataTable
    :value="data"
    stripedRows
    responsiveLayout="scroll"
    showGridlines
    class="custom-table"
    paginator
    :rows="5"
    :rowsPerPageOptions="[5, 10, 20, 50]"
  >
    <Column
      v-for="(col, index) in columns"
      :key="index"
      :field="col.type === 'field' ? col.field : undefined"
      :header="col.title"
    >
      <!-- Columna de tipo slot -->
      <template v-if="col.type === 'slot'" #body="slotProps">
        <slot :name="col.slot" :row="slotProps.data" />
      </template>

      <!-- Columna normal -->
      <template v-else-if="col.type === 'field'" #body="slotProps">
        {{ slotProps.data[col.field] }}
      </template>

      <!-- Columna de acciones -->
      <template v-else-if="col.type === 'action'" #body="slotProps">
        <div class="flex gap-2">
          <template v-for="(el, idx) in col.elements" :key="idx">
            <Link
              v-if="el.type === 'link'"
              :href="el.href + slotProps.data.id"
              class="p-button p-button-text p-button-sm"
            >
              <i :class="`pi ${el.icon}`" :style="{ color: el.color || 'inherit' }"></i>
              <span class="ml-1">{{ el.title }}</span>
            </Link>

            <button
              v-else-if="el.type === 'button'"
              @click="el.onClick(slotProps.data)"
              class="p-button p-button-sm p-button-text"
            >
              <i :class="`pi ${el.icon}`"></i>
              <span class="ml-1">{{ el.title }}</span>
            </button>
          </template>
        </div>
      </template>
    </Column>
  </DataTable>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Column from "primevue/column";
import DataTable from "primevue/datatable";

const props = defineProps({
  data: {
    type: Array,
    required: true,
  },
  columns: {
    type: Array,
    required: true,
  },
});
</script>
<style>
.custom-table .p-button {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
}
.custom-table .p-button i {
  vertical-align: middle;
}
</style>
