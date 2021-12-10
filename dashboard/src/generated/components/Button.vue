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
import {watch, defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useTopic from "/@src/generated/composable/useTopic";

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
  state: {
    name: 'stateRepo',
    key: 'user_form_1.email'
  },
  topic: {
    name: 'stateRepo',
    key: 'user_form_1.email'
  },
  on_click: [
    'test'
  ]
})


const topic = new useTopic()

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
  topic.init(config.topic)
})

// Methods
function onClick() {
  config.on_click.forEach(btn_event => {
    return topic.publish('test')
  })
}

watch(
  topic.listen(),
  (newVal, oldVal) => {
    alert(newVal)
  },
  {
    immediate: false,
    deep: true
  }
)
</script>

<script lang="ts">
export default {
  name: 'gButton'
}
</script>
