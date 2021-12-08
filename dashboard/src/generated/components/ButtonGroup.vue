<template>
  <vField addons>
    <vControl
      v-for="(item,i) in config.children" :key="i">
      <component
        :is="item.component"
        :properties="item.props">
      </component>
    </vControl>
  </vField>
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
  children: []
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gButtonGroup',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
