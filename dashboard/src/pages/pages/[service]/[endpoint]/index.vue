<template>
  <AppLayout>
    <VCard radius="small" v-for="item in page.data" :key="item.id">
      <h3 class="title is-5 mb-2">{{item.email}}</h3>
      <p>
        {{item.name}}
      </p>
    </VCard>
    <!-- Content Wrapper -->
    <RouterView v-slot="{ Component }">
      <transition name="fade-fast" mode="out-in">
        <component :is="Component" :key="route.fullPath"/>
      </transition>
    </RouterView>
  </AppLayout>
</template>
<script setup lang="ts">
import {useRoute} from 'vue-router'
import {onMounted, reactive} from 'vue'
import Api from '/@src/helpers/Api'

const route = useRoute()
const page = reactive({})

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

const api = new Api(`/api/user`)

onMounted(() => {
  get()
})

const get = async () => {
  api.get().then((response: any) => {
    page.data = response.data.data
  })
}

</script>
