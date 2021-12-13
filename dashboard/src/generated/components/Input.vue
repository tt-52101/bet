<template>
  <VField :addons="config.addons.length > 0">
    <VControl
      :expanded="config.addons.length > 0"
      :has-error="config.error === true"
      :icon="config.icon">
      <input
        v-on:keyup.enter="onEnter"
        v-model="value"
        type="text"
        :class="classes"
        :disabled="config.disabled"
        :placeholder="config.placeholder"
      />
    </VControl>
    <VControl v-if="config.addons.length > 0">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.addons" :key="i">
      </component>
    </VControl>
  </VField>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive, watch} from 'vue'
import Repository from '/@src/generated/repositories/Repository'
import _ from "lodash";
import useProperties from "/@src/generated/composable/useProperties";
import useEvents from "/@src/generated/composable/useEvents";
const {apply} = useProperties();

// Props
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
})

const state = reactive({
  repo: {},
  render: 1
})

const config = reactive({
  value: 'test',
  name: '',
  rounded: false,
  focus: '',
  help: '',
  placeholder: '',
  disabled: false,
  error: false,
  icon: '',
  addons: [],
  repo: {
    key: ''
  },
  on_enter: []
})

const {publish} = useEvents();

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

function onEnter(){
  config.on_enter.forEach(event => {
    return publish(event.action, event.payload, event.topic)
  })
}

watch(
  config,
  (newVal, oldVal) => {
    let def = _.get(props.scope, config.name)
    state.repo = new Repository(config.repo, def)
  },
  {
    immediate: false,
    deep: true
  }
)

const value = computed({
  get() {
    state.render++
    if(state.repo.get){
      return state.repo.get()
    }

    return ''
  },
  set(value): void {
    state.repo.set(value)
  },
});

const classes = computed(() => {
  let classes: any = {
    input: true,
    'is-rounded': config.rounded
  }

  const focus = `is-${config.focus}-focus`
  classes[focus] = true;

  return classes
})
</script>

<script lang="ts">
export default {
  name: 'gInput'
}
</script>
