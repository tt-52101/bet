<template>
  <AppLayout>
    <gRoute/>
    <component
      :is="item.component"
      :properties="item.props"
      v-for="(item,i) in page.data.props.children" :key="i">
    </component>
  </AppLayout>
</template>
<script setup lang="ts">
import {useRoute} from 'vue-router'
import {onMounted, reactive, watch} from 'vue'
import useAPi from '/@src/generated/composable/useApi'

const route = useRoute()
const page = reactive({
  data: {
    props: {
      children: []
    }
  }
})

const props = defineProps({
  service: {
    type: String,
    default: ''
  },
  endpoint: {
    type: String,
    default: ''
  },
})

const {get} = useAPi()

onMounted(() => {
  getPage()
})

const getPage = async () => {
  const endpoint = props.endpoint.replaceAll('_','/')
  get(`http://localhost/${props.service}/api/page/${endpoint}`).then((response: any) => {
    page.data = response.data
  })
}

watch(
  props,
  (newVal, oldVal) => {
    getPage()
  },
  {
    immediate: false,
    deep: true
  }
)



</script>
