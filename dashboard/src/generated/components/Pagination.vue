<template>
  <VFlexPagination
    v-if="meta.per_page < meta.total"
    @change="changePage"
    :item-per-page="meta.per_page"
    :total-items="meta.total"
    :current-page="meta.current_page"
    :max-links-displayed="5"
  />
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive, watch} from "vue";
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
  on_change: [],
  events: {
    name: 'stateRepo',
    key: ''
  },
})

const {getData, setData} = useState()
const {publish} = useEvents(config.events);

const meta = reactive({
  current_page: 1,
  per_page: 8,
  total: 19
})

onMounted(() => {
  config.value = apply(props.properties, config)
})

function publishEvents() {
  config.on_change.forEach(event => {
    return publish(event.action, event.payload, event.topic)
  })
}

function changePage(page: number) {
  meta.current_page = page
  setData(`${config.name}.current_page`, page)
}

const value = computed({
  get() {
    return getData(config.name)
  },
});

watch(
  value,
  (newVal, oldVal) => {
    if(newVal) {
      meta.total = newVal.total
      meta.current_page = newVal.current_page
      meta.per_page = newVal.per_page

    }
  },
  {
    immediate: false,
    deep: true
  }
)

</script>

<script lang="ts">
export default {
  name: 'gPagination'
}
</script>
