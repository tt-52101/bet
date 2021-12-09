<template>
   <span>
      {{config.title}}
   </span>
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
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gText',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
