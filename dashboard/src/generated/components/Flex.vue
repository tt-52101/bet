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
      v-for="(item,i) in properties.children" :key="i">
    </component>
  </vFlex>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, toRefs} from "vue";
import useProperties from "/@src/generated/functions/useProperties";

const props = defineProps({
  properties: {
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

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gFlex',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
