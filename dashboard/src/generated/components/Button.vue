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
import {defineProps, reactive} from "vue";

const props = defineProps({
  properties: {
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

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gButton',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
