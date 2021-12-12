<template>
  <VLoader :translucent="true" size="large" :active="state.loading">
  <div style="min-height: 200px">
    <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      v-for="(item,i) in config.children" :key="i">
    </component>
  </div>
  </VLoader>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useApi from "/@src/generated/composable/useApi";

const {apply} = useProperties();
const {get} = useApi();

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
  children: []
})

const state = reactive({
  loading: true
})

onMounted(() => {
  config.value = apply(props.properties, config)
  getPage()
})

function getPage(){
  state.loading = true
  get(config.repo.get).then(res => {
    config.children = res.data.props.children
    state.loading = false
  })
}

</script>

<script lang="ts">
export default {
  name: 'gView'
}
</script>
