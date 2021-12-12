<template>
  <template v-for="(scope,index) in state.items" :key="`${state.render}_${index}`">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.children" :key="i">
      </component>
  </template>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, watch} from "vue";
import Repository from '/@src/generated/repositories/Repository';
import useProperties from "/@src/generated/composable/useProperties";
import useState from "/@src/generated/composable/useState";
import useEvents from "/@src/generated/composable/useEvents";
import useApi from "/@src/generated/composable/useApi";

const {apply} = useProperties();
const {get} = useApi()

const props = defineProps({
  properties: {
    type: Object,
    default() {
      return {}
    }
  }
});

const config = reactive({
  name: '',
  repo: {},
  children: []
})

const state = reactive({
  repo: {},
  items: {},
  meta: {},
  render: 1,
  loading: true
})

function initRepository() {
  state.repo = new Repository(config.repo)
  listenTopic({key: config.name})
  getItems()
}

const {setData, getData} = useState()
let {listen, action, listenTopic} = useEvents()

onMounted(() => {
  config.value = apply(props.properties, config)
})

action('get', (value: any) => {
  getItems()
})

function getItems() {
  const page = getData(`${config.name}.meta.current_page`)

  get(config.repo.get, {page: page}).then(res => {
    state.items = res.data.data
    state.meta = res.data.meta
    setData(`${config.name}.meta`, state.meta)
    setData(`${config.name}.items`, state.items)
    state.render++
  })
}

watch(
  config,
  (newVal, oldVal) => {
    initRepository()
  },
  {
    immediate: false,
    deep: true
  }
)

</script>

<script lang="ts">

export default {
  name: 'gBuilder',
  inheritAttrs: false
}
</script>
