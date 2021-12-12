<template>
  <template v-for="(scope,index) in state.items" :key="index">
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
  name: '',
  repo: {},
  children: []
})

const state = reactive({
  repo: {},
  items: {},
  meta: {}
})

function initRepository() {
  state.repo = new Repository(config.repo)
  getItems()
}

const {setData} = useState()
let {listen, action, listenTopic} = useEvents()

onMounted(() => {
  config.value = apply(props.properties, config)
})

action('get', (value: any) =>{
  getItems()
})

function getItems()  {
  state.repo.get().then(res => {
    state.items = res.data
    state.meta = res.meta
    setData(`${config.name}.meta`, state.meta)
    setData(`${config.name}.items`, state.items)
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
