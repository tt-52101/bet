<template>
  <li v-if="item.children.length === 0  ">
    <RouterLink :to="{ path: item.url}">
      <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
      {{item.title}}
    </RouterLink>
  </li>
  <li v-else v-has-nested-router-link class="has-children">
    <div class="collapse-wrap">
      <a class="parent-link">
        {{item.title}}
        <i
          aria-hidden="true"
          class="iconify"
          data-icon="feather:chevron-right"
        />
      </a>
    </div>
    <ul>
      <sidebar-item v-for="menu in item.children" :key="menu.id" :item="menu"></sidebar-item>
    </ul>
  </li>
</template>

<script setup lang="ts">
import SidebarItem from './SidebarItem.vue';

defineProps({
  item: {
    type: Object,
    default() {
      return {}
    }
  }
});
</script>
