<template>
  <template v-for="(scope,index) in state.items.data" :key="index">
    <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      v-for="(item,i) in config.children" :key="i">
    </component>
  </template>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, watch} from "vue";
import Repository from '/@src/generated/repositories/Repository';

const props = defineProps({
  properties: {
    type: Object,
    default() {
      return {}
    }
  }
});

const config = reactive({
  repo: {},
  children: []
})

const state = reactive({
  repo: {},
  items: {}
})

function initRepository() {
  state.repo = new Repository(config.repo)
  state.repo.get().then(res => {
    state.items = res
  })
}

watch(
  config,
  (newVal, oldVal) => {
    initRepository()
  },
  {
    immediate: false,
    deep: true
  }
)

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
import {onMounted} from "vue";

export default {
  name: 'gBuilder',
  inheritAttrs: false,
  mixins: [Properties],
  mounted() {
    this.apply(this.properties)
  }
}
</script>
