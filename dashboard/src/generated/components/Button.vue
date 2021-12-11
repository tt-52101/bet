<template>
  <vButton
    @click="onClick"
    :color="config.type"
    :outlined="config.outlined"
    :icon="config.icon"
    :align="config.align"
    :rounded="config.rounded">
    {{ config.title }}
  </vButton>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useEvents from "/@src/generated/composable/useEvents";

const {apply} = useProperties();

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

const state = reactive({
  topic: {}
})

const config = reactive({
  title: '',
  icon: '',
  type: 'primary',
  align: '',
  rounded: false,
  outlined: false,
  events: {
    name: 'stateRepo',
    key: ''
  },
  on_click: [
    {
      topic: 'form',
      action: 'update',
      value: 'lora'
    }
  ]
})


const {publish} = useEvents(config.events);

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

// Methods
function onClick() {
  config.on_click.forEach(btn_event => {
    return publish(btn_event.action, btn_event.payload, btn_event.topic)
  })
}

</script>

<script lang="ts">
export default {
  name: 'gButton'
}
</script>
