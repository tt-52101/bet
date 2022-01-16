<template>
  <template v-if="state_items.length" v-for="(scope,index) in state_items" :key="`${state.render}_${index}`">
    <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      v-for="(item,i) in config.children" :key="i">
    </component>
  </template>
  <template v-else>
    <div class="column" v-if="config.no_results.length === 0">
      <VCardAdvanced>
        <template #content>
          {{config.not_found}}
        </template>
      </VCardAdvanced>
    </div>
    <div class="column" v-else>
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.no_results" :key="i">
      </component>
    </div>

  </template>

</template>

<script setup lang="ts">
import {defineProps, computed, onMounted, reactive, watch} from "vue";
import Repository from '/@src/generated/repositories/Repository';
import useProperties from "/@src/generated/composable/useProperties";
import useState from "/@src/generated/composable/useState";
import useEvents from "/@src/generated/composable/useEvents";
import useApi from "/@src/generated/composable/useApi";
import _ from "lodash";

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
  children: [],
  no_results: [],
  not_found: 'No Results Found'
})

const state = reactive({
  repo: {
    filters: {}
  },
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

action('search', (value: any) => {
  changePage(1)
  getItems()
})

action('get', (value: any) => {
  getItems()
})

action('clear', (value: any) => {
  changePage(1)
  clearFilters()
  getItems()
})

function getItems() {
  state.loading = true
  const page = getData(`${config.name}.meta.current_page`)
  let filters = getData(`${config.name}.query`)

  if (!filters) {
    filters = {}
  }

  Object.keys(config.repo.filters).forEach((k) => {
    filters[k] = config.repo.filters[k]
  });

  filters.page = page;
  get(config.repo.get, filters).then(res => {
    state.items = res.data.data
    state.meta = res.data.meta
    setData(`${config.name}.meta`, state.meta)
    setData(`${config.name}.items`, state.items)
    state.render++
    state.loading = false
  })
}

function changePage(page: number) {
  setData(`${config.name}.meta.current_page`, page)
}

function clearFilters() {
  setData(`${config.name}.query`, {})
}

const state_items = computed({
  get() {
    let items = []
    if (config.repo.name === 'stateRepo') {
      return getData(config.name)
    }
    return state.items
  },

});

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
