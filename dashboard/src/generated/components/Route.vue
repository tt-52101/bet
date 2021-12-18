<template>

</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useEvents from '/@src/generated/composable/useEvents'
import {useRouter, useRoute} from 'vue-router'

const {listen, clearAll, listenTopic, action} = useEvents()
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

function clearEvents(){
  this.$store.dispatch("component/clearEvents");
}

action('push', (value: any) => {
  clearAll()
  router.push(value)
})

action('back', (value: any) => {
  clearAll()
  router.back()
})

</script>

<script lang="ts">
export default {
  name: 'gRoute'
}
</script>
