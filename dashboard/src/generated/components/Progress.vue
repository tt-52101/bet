<template>
    <div class="m-1 pr-label">{{config.title}} : {{value}} %</div>
    <VProgress :size="config.size" :max="config.max" :color="config.color" :value="value" />
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
  size: 'small',
  color: 'primary',
  max: 100
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

    return 0
  },
  set(value: string): void {
    state.repo.set(value)
  },
});
</script>

<script lang="ts">
export default {
  name: 'gProgress'
}
</script>


<style lang="scss">
.pd-label {
  display: block;
  margin-bottom: 20px;
}
</style>
