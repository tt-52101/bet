<template>
  <VCollapse :items="config.items" with-chevron :itemOpen="config.active">
    <template #item="{active}">
      <div v-for="(tab,i) in config.items" :key="i">
        <div v-if="active === i">
          <component
            :is="item.component"
            :properties="item.props"
            :scope="scope"
            v-for="(item,i) in tab.children" :key="i">
          </component>
        </div>
      </div>

    </template>
  </VCollapse>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";

const {apply} = useProperties();

const props = defineProps({
  properties: {
    type: Object,
    default() {
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
  items: []
})

onMounted(() => {
  config.value = apply(props.properties, config)
})
</script>

<script lang="ts">
export default {
  name: 'gAccordion'
}
</script>
