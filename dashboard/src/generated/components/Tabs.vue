<template>
  <VTabs
         :type="config.type"
         :align="config.align"
         :tabs="config.tabs" :selected="config.active" v-if="config.active">
    <template #tab="{activeValue, tabs}">
      <div v-for="(tab,i) in config.tabs" :key="i">
        <transition :name="props.slow ? 'fade-slow' : 'fade-fast'" mode="out-in">
          <div v-if="activeValue === tab.value">
            <component
              :is="item.component"
              :properties="item.props"
              :scope="scope"
              v-for="(item,i) in tab.props.children" :key="i">
            </component>
          </div>
        </transition>
      </div>
    </template>
  </VTabs>
</template>

<script setup lang="ts">
import {defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";

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
  active: '',
  type: '',
  tabs: []
})

onMounted(() => {
  config.value = apply(props.properties, config)
})
</script>

<script lang="ts">
export default {
  name: 'gTabs'
}
</script>
