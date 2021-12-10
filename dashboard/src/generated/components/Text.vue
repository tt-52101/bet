<template>
   <div>
      {{text}}
   </div>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive} from "vue";
import {useScope} from '/@src/generated/composable/useScope'
import {apply} from "/@src/generated/composable/useProperties";

// Props
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
})

// Data
const config = reactive({
  title: '',
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

const {process}  = useScope(props.scope);
const text = computed(()=>{
  return process(config.title)
})
</script>

<script lang="ts">
export default {
  name: 'gText'
}
</script>
