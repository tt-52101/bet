<template>
  <div>
      <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      v-for="(item,i) in config.children" :key="i">
    </component>
    <div class="is-divider"></div>
  </div>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, watch} from 'vue'
import Repository from '/@src/generated/repositories/Repository'
import {apply} from '/@src/generated/composable/useProperties'

const props = defineProps({
  properties: {
    type: Object,
    default() {
      return {}
    }
  },
  scope: {
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

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

</script>

<script lang="ts">
export default {
  name: 'gForm',
  inheritAttrs: false
}
</script>
