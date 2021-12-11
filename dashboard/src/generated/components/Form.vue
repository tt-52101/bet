<template>
  <div>
    <h1 @click="onClick">Form</h1>
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
    listen: 'form'
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

let {publish,listen, action} = useEvents(config.events)

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

function onClick() {
  publish('update', 'lora', 'form')
}

action('update', (value: any) => {
  console.log(config.events.listen)
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
