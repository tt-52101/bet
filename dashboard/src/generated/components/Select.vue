<template>
  <VField class="is-autocomplete-select">
    <VControl icon="feather:search">
      <Multiselect
        v-model="value"
        :options="config.options"
        :mode="config.multiple ? 'tags': 'single'"
        :searchable="true"
        :create-tag="false"
        :valueProp="config.valueProp"
        :label="config.labelProp"
        :placeholder="config.label"
      >
      </Multiselect>
    </VControl>
  </VField>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive, ref, watch} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import _ from "lodash";
import Repository from "/@src/generated/repositories/Repository";
import StateRepo from "/@src/generated/repositories/StateRepo";

const {apply} = useProperties();


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

const state = reactive({
  repo: {},
  render: 1
})

const config = reactive({
  name: '',
  label: '',
  labelProp: 'title',
  valueProp: 'id',
  multiple: true,
  repo: {
    name: 'stateRepo',
    key: ''
  },
  options: []
})

onMounted(() => {
  config.value = apply(props.properties, config)
})

watch(
  config,
  (newVal, oldVal) => {
    let def = _.get(props.scope, config.name)
    state.repo = new StateRepo({key: config.name}, def)
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

    return []
  },
  set(value): void {
    state.repo.set(value)
  },
});
</script>

<script lang="ts">
export default {
  name: 'gSelect'
}
</script>
