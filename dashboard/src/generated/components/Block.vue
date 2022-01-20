<template>
  <VBlock :title="process(config.title)" :subtitle="process(config.subtitle)" :center="config.center" >
    <template #icon>
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.icon" :key="i">
      </component>
    </template>
    <template #action>
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.action" :key="i">
      </component>
    </template>
  </VBlock>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import {useScope} from '/@src/generated/composable/useScope'

const {apply} = useProperties();

const props = defineProps({
  properties: {
    type: Object,
    default(){
      return {}
    }
  },
  scope: {
    type: Object,
    default() {
      return {}
    }
  }
});

const config = reactive({
  title: '',
  subtitle: '',
  icon: [],
  action: [],
  center: true
})

const {process}  = useScope(props.scope);

onMounted(() => {
  config.value = apply(props.properties, config)
})
</script>

<script lang="ts">
export default {
  name: 'gBlock'
}
</script>
