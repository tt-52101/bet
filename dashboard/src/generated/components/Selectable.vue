<template>
    <vFlex column-gap="10px" flex-wrap="wrap" justify-content="space-evenly" style="width:100%">
      <vFlexItem :flex-grow="1" v-for="(option,i) in config.options" @click="select(option)" :key="i">
        <VCard radius="small" :color="isSelected(option) ? 'success': 'primary'">
          <h3 class="title is-5 mb-2">{{option[config.label]}}</h3>
          <p class="is-bold">
            {{ process(option.subtitle)}}
          </p>
        </VCard>
      </vFlexItem>
    </vFlex>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useState from "/@src/generated/composable/useState";
import {useScope} from "/@src/generated/composable/useScope";

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

const config = reactive({
  identifier: 'id',
  label: 'title',
  subtitle: 'subtitle',
  options: []
})

const {process}  = useScope(props.scope);

onMounted(() => {
  config.value = apply(props.properties, config)
})

const {select: selectItem, getData} = useState()

function select(item: any) {
  selectItem(config.name, config.identifier, process(item))
}

function isSelected(option: any) {
  if (typeof selected.value === 'undefined') {
    return false
  }
  const index = selected.value.findIndex(el => {
    return (el[config.identifier] === process(option[config.identifier]))
  })

  return index > -1
}

const selected = computed({
  get() {
    return getData(config.name)
  },

});
</script>

<script lang="ts">
export default {
  name: 'gSelectable'
}
</script>

<style lang="scss" scoped>
  .r-card {
    padding: 10px 15px;
  }
</style>
