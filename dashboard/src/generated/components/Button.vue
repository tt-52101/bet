<template>
 <vButton
   :color="config.type"
   :outlined="config.outlined"
   :icon="config.icon"
   :align="config.align"
   :rounded="config.rounded">
   {{config.title}}
 </vButton>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import {apply} from "/@src/generated/composable/useProperties";

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
  title: '',
  icon: '',
  type: 'primary',
  align: '',
  rounded: false,
  outlined: false,
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})
</script>

<script lang="ts">
export default {
  name: 'gButton'
}
</script>
