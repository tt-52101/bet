<template>
   <div>
      {{text}}
   </div>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive} from "vue";
import {useScope} from '/@src/generated/composable/useScope'

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

const {process}  = useScope(props.scope);
const text = computed(()=>{
  return process(config.title)
})
</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gText',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  },
  scope: {
    type: Object,
    default(){
      return {}
    }
  }
}
</script>
