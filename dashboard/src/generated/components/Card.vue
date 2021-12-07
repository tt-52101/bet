<template>
  <vCard
    :radius="config.radius"
    :elevated="config.elevated"
    :color="config.color">
    <component
      :is="item.component"
      :properties="item.props"
      v-for="(item,i) in properties.children" :key="i">
    </component>
  </vCard>
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
  radius: 'small',
  elevated: false,
  color: ''
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gCard',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
