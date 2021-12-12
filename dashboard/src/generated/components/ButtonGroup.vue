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
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
const {apply} = useProperties();

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

onMounted(() => {
  config.value = apply(props.properties, config)
})
</script>

<script lang="ts">
export default {
  name: 'gButtonGroup'
}
</script>
