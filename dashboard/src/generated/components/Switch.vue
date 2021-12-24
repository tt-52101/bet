<template>
  <VControl>
    <VSwitchBlock :color="config.color" :thin="config.thin" v-model="value" :label="config.title" />
  </VControl>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import Repository from "/@src/generated/repositories/Repository";
import _ from "lodash";

const {apply} = useProperties();
const date = reactive();

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
  name: '',
  title: '',
  thin: true,
  color: 'primary'
})

const state = reactive({
  repo: {},
  render: 1
})

onMounted(() => {
  config.value = apply(props.properties, config)
  let def = _.get(props.scope, config.name)
  state.repo = new Repository(config.repo, def)
})

const value = computed({
  get() {
    state.render++
    if (state.repo.get) {
      return state.repo.get()
    }

    return ''
  },
  set(value: string): void {
    state.repo.set(value)
  },
});
</script>

<script lang="ts">
export default {
  name: 'gSwitch'
}
</script>
