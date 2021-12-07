<template>
  <AppLayout>
    <component
      :is="item.component"
      :properties="item.props"
      v-for="(item,i) in page.data.props.children" :key="i">
    </component>
  </AppLayout>
</template>
<script setup lang="ts">
import {useRoute} from 'vue-router'
import {onMounted, reactive} from 'vue'
import Api from '/@src/helpers/Api'

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

const api = new Api(`/api/page/user`)

onMounted(() => {
  get()
})

const get = async () => {
  api.get().then((response: any) => {
    page.data = response.data
  })
}

</script>
