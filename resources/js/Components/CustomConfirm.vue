<template>
  <!-- Componente dialog   -->
  <!-- Al colocar el ¿ valor "modal" hace que el background se desactive, si no se coloca, se puede interactuar con el resto de la pantalla.-->
  <!-- Al coloca el ":closable="false" oculta el "X" propio del Dialog para cerrar el dialog, si lo  paso a true, aparece.-->
  <Dialog
    :header="header"
    v-model:visible="visible"
    modal
    :closable="false"
    :style="{ width: '350px' }"
    class="customConfirm"
  >
    <p>{{ message }}</p>

    <template #footer>
      <!-- Aqui le emito el "emit('cancel')" para cuando se use el componente pasarle una acción-->
      <Button
        label="Cancelar"
        icon="pi pi-times"
        severity="secondary"
        @click="$emit('cancel')"
      />
      <!-- Aqui le emito el "emit('confirm')" para cuando se use el componente pasarle una acción-->
      <Button
        label="Aceptar"
        icon="pi pi-check"
        severity="danger"
        @click="$emit('confirm')"
      />
    </template>
  </Dialog>
</template>

<script setup>
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import { computed } from "vue";

const props = defineProps({
  header: String,
  message: String,
  showDialog: Boolean,
});

const emit = defineEmits(["confirm", "cancel"]);

const visible = computed({
  get: () => props.showDialog, //Este valor se ejecuta cuando Vue lee el valor de "visible" para dfecidir si se muestra o no.
  set: () => emit("cancel"),
});
</script>
