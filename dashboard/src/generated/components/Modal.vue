<template>
<div>
  <VModal
    :title="config.title"
    :open="state.modal"
    :size="config.size"
    :rounded="config.rounded"
    :actions="config.actions"
    @close="close"
    actions="center"
  >
    <template #content>
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </template>
    <template #action>
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.footer" :key="i">
      </component>
    </template>
  </VModal>
</div>
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

const config = reactive({
  name: '',
  title: '',
  size: 'medium',
  rounded: true,
  children: [],
  footer: [],
  actions: 'right'
})

const state = reactive({
  modal: false
})


const {listenTopic, listen, action} = useEvents()

onMounted(() => {
  config.value = apply(props.properties, config)
  listenTopic({key: config.name})
})

action('show', () => {
  show()
})

function show() {
  state.modal = true
}

action('close', () => {
  close()
})
function close() {
  state.modal = false
}
</script>

<script lang="ts">
export default {
  name: 'gModal'
}
</script>
