<script setup lang="ts">
import Api from '/@src/helpers/Api';
import SidebarItem from './SidebarItem.vue';

import {reactive, onMounted} from "vue";

const emit = defineEmits(['close'])

onMounted(() => {
  getMenu();
})

const state = reactive({
  menu: [],
  loading: true
});

function getMenu() {
  const api = new Api('menu');
  state.loading = true;
  api.get({parent_name: 'side_bar'}, 1, '/api/menu/tree').then(res => {
    state.menu = res.data;
    state.loading = false
  })
}
</script>

<template>
  <div class="sidebar-panel is-generic">
    <div class="subpanel-header">
      <h3 class="no-mb">Dashboards</h3>
      <div class="panel-close" @click="emit('close')">
        <i aria-hidden="true" class="iconify" data-icon="feather:x"></i>
      </div>
    </div>
    <div class="inner" data-simplebar>

      <ul>
        <VLoader :translucent="true" size="large" :active="state.loading">
        <sidebar-item v-for="item in state.menu" :key="item.id" :item="item"></sidebar-item>
        </VLoader>
      </ul>
    </div>
  </div>
</template>

<style lang="scss">
@import '../../scss/layout/_sidebar-panel.scss';
</style>
