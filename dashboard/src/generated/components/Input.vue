<template>
  <VField :addons="config.addons.length > 0">
    <VControl
      :expanded="config.addons.length > 0"
      :has-error="config.error === true"
      :icon="config.icon">
      <input
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
import Repository from '/@src/generated/repositories/Repository.js'
import {apply} from '/@src/generated/composable/useProperties'
import _ from "lodash";
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
  }
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

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
