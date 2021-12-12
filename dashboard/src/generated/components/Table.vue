<template>
  <VFlexTable>
    <template #header>
      <div class="flex-table-header">
        <span v-for="column in config.columns" :class="{'cell-end': column.props.end}">
            {{column.props.title}}
        </span>
      </div>
    </template>
    <template #body>
      <component
        :is="item.component"
        :properties="item.props"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </template>
  </VFlexTable>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useApi from "/@src/generated/composable/useApi";

const {apply} = useProperties();
const {get} = useApi()

const props = defineProps({
  properties: {
    type: Object,
    default() {
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
  children: [],
  builder :{
    children: []
  }
})

onMounted(() => {
  config.value = apply(props.properties, config)
})
</script>

<script lang="ts">
export default {
  name: 'gTable'
}
</script>
