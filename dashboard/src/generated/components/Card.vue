<template>
  <VCardAdvanced  :radius="config.radius">
    <template #header-left v-if="config.header_left.length">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.header_left" :key="i">
      </component>
    </template>
    <template #header-right v-if="config.header_right.length">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.header_right" :key="i">
      </component>
    </template>
    <template #content>
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </template>
    <template #footer-left v-if="config.footer_left.length">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.footer_left" :key="i">
      </component>
    </template>
    <template #footer-right v-if="config.footer_right.length">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.footer_right" :key="i">
      </component>
    </template>
  </VCardAdvanced>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, toRefs} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
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
    default(){
      return {}
    }
  }
});

const config = reactive({
  radius: 'regular',
  header_left: [],
  header_right: [],
  children: [],
  footer_left: [],
  footer_right: [],
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})
</script>

<script lang="ts">
export default {
  name: 'gCard'
}
</script>
