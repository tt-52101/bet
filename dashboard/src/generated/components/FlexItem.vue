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
  grow: 0,
  shrink: 0,
  order: 0
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gFlexItem',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
