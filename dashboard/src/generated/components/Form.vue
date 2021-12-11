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
import Repository from "/@src/generated/repositories/Repository"
import useProperties from "/@src/generated/composable/useProperties";
import useEvents from "/@src/generated/composable/useEvents";

const {apply} = useProperties()

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
  events: {
    name: 'stateRepo',
    key: ''
  },
  children: []
})

const state = reactive({
  repo: {},
  items: {},
  events: {}
})

function initRepository() {
  state.repo = new Repository(config.repo)
}

let {publish,listen, action, listenTopic} = useEvents()

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
  listenTopic(config.events)
})

action('update', (value: any) => {
  console.log(value)
})

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
export default {
  name: 'gForm',
  inheritAttrs: false
}
</script>
