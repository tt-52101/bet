<template>
  <VBillboardJS
    v-if="config.init"
    class="gauge-holder"
    :options="options"
    @ready="onReady"
  />
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import type {Chart} from 'billboard.js'
import {gauge} from 'billboard.js'
import { themeColors } from '/@src/utils/themeColors'


const {apply} = useProperties();

const props = defineProps({
  properties: {
    type: Object,
    default() {
      return {}
    }
  }
});


const config = reactive({
  init: false,
  legend: '',
  columns: [['Win', 0]],
  threshold: [30, 60, 90, 100],
  height: 120,
  show_legend: false,
  colors: [
    themeColors.primary,
    themeColors.info,
    themeColors.orange,
    themeColors.green,
  ]
})

const options = reactive({
  data: {
    columns: config.columns,
    type: gauge(),
  },
  gauge: {},
  color: {
    pattern: config.colors,
    threshold: {
      values: [],
    },
  },
  size: {
    height: config.height,
  },
  padding: {
    bottom: 0,
  },
  legend: {
    show: false,
    position: 'inset',
  },
})

onMounted(() => {
  config.value = apply(props.properties, config)
  setGaugeOptions()
})

function setGaugeOptions(){
  options.size.height = config.height
  options.data.columns =[[config.legend , 84]]
  options.legend.show = config.show_legend
  options.color.threshold.values = config.threshold
  config.init = true
}

function onReady(billboard: Chart) {

}

</script>

<script lang="ts">
export default {
  name: 'gGauge'
}
</script>
