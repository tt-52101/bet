<template>
  <div>
    <VLoader :translucent="true" size="large" :active="state.loading">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="Object.keys(state.scope).length > 0 ? state.scope : scope"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </VLoader>
  </div>
</template>

<script setup lang="ts">
import {defineProps, onUnmounted, onMounted, reactive, watch} from 'vue'
import Repository from "/@src/generated/repositories/Repository"
import useProperties from "/@src/generated/composable/useProperties";
import useEvents from "/@src/generated/composable/useEvents";
import useApi from "/@src/generated/composable/useApi";
import useState from "/@src/generated/composable/useState";
import {Notyf} from 'notyf'
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
      return null
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
  children: [],
  data: [],
  on_created: [],
  on_updated: [],
  on_deleted: []
})

const state = reactive({
  repo: {},
  items: {},
  events: {},
  scope: {},
  loading: true
})

function initRepository() {
  state.repo = new Repository(config.repo)
}

let {publish, listen, action, listenTopic} = useEvents()

onMounted(() => {

  state.scope = props.properties.data

  if(Object.keys(props.properties.data).length === 0){
    state.scope = props.scope
  }

  config.value = apply(props.properties, config, state.scope)

  listenTopic(config.events)
  setData(`${config.name}.body`, config.data)
  state.loading = false
})

onUnmounted(() => {
  setData(`${config.name}`, {})
})


const {post, update, get, del} = useApi()
const {getData, setData} = useState();
const notyf = new Notyf()

function publishEvents(events: []) {
  events.forEach(event => {
    return publish(event.action, event.payload, event.topic)
  })
}

function syncScope(entry: any) {
  config.data = entry
  config.value = apply(props.properties, config, config.data)
}

function refresh() {
  state.loading = true

  get(config.repo.get).then(response => {
    setData(`${config.name}.body`, response.data)
  }).then(response => {
    state.loading = false
  })
}

action('refresh', (value: any) => {
  refresh()
})

action('show', (value: any) => {
  state.loading = true

  get(config.repo.show).then(response => {
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
    syncScope(response.data.entry)
    publishEvents(config.on_created)
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
    setData(`${config.name}.body`, response.data.body)
    notyf.success(response.data.message)
    publishEvents(config.on_updated)
  }).catch(err => {
    state.loading = false
    const message = err.response.data.message
    notyf.error(message ? message : 'Error on Create')
  })
})

action('delete', (value: any) => {
  del(config.repo.delete).then(response => {
    state.loading = false
    notyf.success(response.data.message)
    publishEvents(config.on_deleted)
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
