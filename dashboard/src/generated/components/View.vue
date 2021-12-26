<template>
  <VLoader :translucent="true" size="large" :active="state.loading">
    <div style="min-height: 200px">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.children" :key="state.render">
      </component>
    </div>
  </VLoader>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useApi from "/@src/generated/composable/useApi";
import useEvents from "/@src/generated/composable/useEvents";
import useState from "/@src/generated/composable/useState";

const {apply} = useProperties();
const {get} = useApi();

const {getData, setData} = useState();

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
  name: '',
  topic: '',
})

const state = reactive({
  loading: true,
  render: 1,
})

let {publish, listen, action, listenTopic} = useEvents()

onMounted(() => {
  config.value = apply(props.properties, config)
  listenTopic({key: config.topic})
  getPage()
})

function getPage() {
  state.loading = true
  let filters = getData(config.name)

  if (!filters) {
    filters = {}
  }

  Object.keys(config.repo.filters).forEach((k) => {
    filters[k] = config.repo.filters[k]
  });

  get(config.repo.get, filters).then(res => {
    config.children = res.data.props.children
    state.loading = false
    state.render+=1
  })
}

action('get', (value: any) => {
  getPage()
})

</script>

<script lang="ts">
export default {
  name: 'gView'
}
</script>
