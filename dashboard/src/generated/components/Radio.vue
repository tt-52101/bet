<template>
  <VField>
    <VControl>
      <VRadio
        v-model="value"
        :value="config.val"
        :label="config.title"
        :name="config.name"
        :solid="config.solid"
        :color="config.color"
      />
    </VControl>
  </VField>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import Repository from "/@src/generated/repositories/Repository";
import _ from "lodash";
import useEvents from "/@src/generated/composable/useEvents";

const {apply} = useProperties();
const {publish} = useEvents();

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
  color: 'primary',
  val: '',
  solid: false,
  on_change: []
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

function onChange() {
  config.on_change.forEach(event => {
    return publish(event.action, event.payload, event.topic)
  })
}

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
  name: 'gRadio'
}
</script>
