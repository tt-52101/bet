<template>
  <div :class="{'flex-table-cell':true, 'is-bold': true,'cell-end':config.end}"
       :data-th="config.title">
    <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      :key="i"
      v-for="(item,i) in config.children"
    >
    </component>
  </div>
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
    default() {
      return {}
    }
  }
});

const config = reactive({
  title: '',
  end: false,
  children: []
})

onMounted(() => {
  config.value = apply(props.properties, config)
})
</script>

<script lang="ts">
export default {
  name: 'gTableColumn'
}
</script>
