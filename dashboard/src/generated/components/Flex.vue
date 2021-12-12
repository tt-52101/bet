<template>
  <vFlex
    :flex-direction="config.direction"
    :flex-wrap="config.wrap"
    :align-items="config.align_items"
    :align-content="config.align_content"
    :row-gap="config.row_gap"
    :column-gap="config.column_gap"
    :inline="config.inline"
    :justify-content="config.justify">
    <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      v-for="(item,i) in properties.children" :key="i">
    </component>
  </vFlex>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, toRefs} from "vue";
import useProperties from "/@src/generated/composable/useProperties";

const {apply} = useProperties();

const props = defineProps({
  properties: {
    type: Object,
    default(){
      return {}
    }
  },
  scope: {
    type: Object,
    default(){
      return {}
    }
  }
});

const config = reactive({
  direction: 'row',
  wrap: 'wrap',
  justify: 'normal',
  align_items: 'normal',
  align_content: 'normal',
  row_gap: '',
  column_gap: 'row',
  inline: false,
  children: []
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

</script>

<script lang="ts">
export default {
  name: 'gFlex'
}
</script>
