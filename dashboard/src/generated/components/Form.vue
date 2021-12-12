<template>
  <div>
    <VLoader :translucent="true" size="large" :active="state.loading">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </VLoader>
    <div class="is-divider"></div>
  </div>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive, watch} from 'vue'
import Repository from "/@src/generated/repositories/Repository"
import useProperties from "/@src/generated/composable/useProperties";
import useEvents from "/@src/generated/composable/useEvents";
import useApi from "/@src/generated/composable/useApi";
import useState from "/@src/generated/composable/useState";
import { Notyf } from 'notyf'
import useNotyf from "/@src/composable/useNotyf";

const {apply} = useProperties()

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
  repo: {
    get: '',
    post: '',
    patch: '',
    delete: ''
  },
  name: '',
  events: {
    name: 'stateRepo',
    key: ''
  },
  children: []
})

const state = reactive({
  repo: {},
  items: {},
  events: {},
  loading: true
})

function initRepository() {
  state.repo = new Repository(config.repo)
}

let {publish, listen, action, listenTopic} = useEvents()

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
  listenTopic(config.events)
  state.loading = false
})

const {post, update, get} = useApi()
const {getData, setData} = useState();
const notyf = new Notyf()

action('refresh', (value: any) => {
  state.loading = true

  get(config.repo.get).then(response => {
    setData(`${config.name}.body`, response.data)
  }).then(response => {
    state.loading = false
  })
})

action('create', (value: any) => {
  state.loading = true
  const data = getData(`${config.name}.body`)
  post(config.repo.post, data).then(response => {
    state.loading = false
    notyf.success(response.data.message)
  }).catch(err => {
    state.loading = false
    const message = err.response.data.message
    notyf.error(message ? message : 'Error on Create')
  })
})

action('update', (value: any) => {
  state.loading = true
  const data = getData(`${config.name}.body`)
  update(config.repo.patch, data).then(response => {
    state.loading = false
    notyf.success(response.data.message)
  }).catch(err => {
    state.loading = false
    const message = err.response.data.message
    notyf.error(message ? message : 'Error on Create')
  })
})

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
  name: 'gForm',
  inheritAttrs: false
}
</script>
