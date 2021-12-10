<template>
  <vFlexItem
    :flex-order="config.order"
    :flex-grow="config.grow"
    :flex-shrink="config.shrink">
    <component
      :is="item.component"
      :properties="item.props"
      v-for="(item,i) in properties.children" :key="i">
    </component>
  </vFlexItem>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, toRefs} from "vue";
import {apply} from "/@src/generated/composable/useProperties";

const props = defineProps({
  properties: {
    type: Object,
    default(){
      return {}
    }
  }
});

const config = reactive({
  grow: 0,
  shrink: 0,
  order: 0
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})
</script>

<script lang="ts">
export default {
  name: 'gFlexItem'
}
</script>
