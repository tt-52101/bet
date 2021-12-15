<template>

</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useEvents from '/@src/generated/composable/useEvents'
import {useRouter, useRoute} from 'vue-router'

const {listen, listenTopic, action} = useEvents()
const router = useRouter();

const props = defineProps({
  properties: {
    type: Object,
    default() {
      return {}
    }
  },
});

const config = reactive({
  name: 'route'
})

onMounted(() => {
  listenTopic({key: config.name})
})

action('push', (value: any) => {
  router.push(value)
})

action('back', (value: any) => {
  router.back()
})

</script>

<script lang="ts">
export default {
  name: 'gRoute'
}
</script>
