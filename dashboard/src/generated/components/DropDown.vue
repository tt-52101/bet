<template>
  <VDropdown :icon="config.icon" :title="config.title" :color="config.type" spaced>
    <template #content>
      <component
        :is="item.component"
        :properties="item.props"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </template>
  </VDropdown>
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
  title: '',
  icon: '',
  type: '',
  children: []
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

</script>

<script lang="ts">
export default {
  name: 'gDropDown'
}
</script>
