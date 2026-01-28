<template>
  <aside class="sidebar">
    <ul class="menu">
      <li v-for="(item, index) in menuItems" :key="index">
        <!-- ITEM SIN SUBMENÚ -->
        <Link v-if="!item.subItems" :href="item.route" class="menu-item">
          <div class="menu-content">
            <i :class="item.icon"></i>
            <span>{{ item.label }}</span>
          </div>
        </Link>

        <!-- ITEM CON SUBMENÚ -->
        <div v-else class="menu-item has-submenu" @click="toggle(index)">
          <div class="menu-content">
            <i :class="item.icon"></i>
            <span>{{ item.label }}</span>
          </div>

          <i
            class="pi"
            :class="openIndex === index ? 'pi-chevron-down' : 'pi-chevron-right'"
          />
        </div>

        <!-- SUBMENÚ -->
        <ul v-if="item.subItems && openIndex === index" class="submenu">
          <li v-for="(sub, subIndex) in item.subItems" :key="subIndex">
            <Link :href="sub.route" class="submenu-item">
              <i :class="sub.icon"></i>
              <span>{{ sub.label }}</span>
            </Link>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { menuItems } from "@/config/MenuItem";
const openIndex = ref(null);

const toggle = (index) => {
  openIndex.value = openIndex.value === index ? null : index;
};
</script>

<style scoped>
.sidebar {
  width: 260px;
  min-height: 100vh;
  background-color: #1f2937;
  color: #ffffff;
  padding: 1rem;
}

.menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu-item,
.submenu-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.7rem 0.9rem;
  border-radius: 6px;
  cursor: pointer;
  text-decoration: none;
  color: inherit;
  justify-content: flex-start;
}

.menu-content {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

/* SOLO para los que tienen submenú */
.menu-item.has-submenu {
  justify-content: space-between;
}
.submenu {
  margin-left: 20px;
}
.submenu-item:hover {
  color: rgb(35, 137, 253);
}

.menu-item:hover {
  color: rgb(35, 137, 253);
}
</style>
