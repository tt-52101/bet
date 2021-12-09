<template>
  <VDropdown :icon="config.icon" :title="config.title" :color="config.type" spaced>
    <template #content>
      <component
        :is="item.component"
        :properties="item.props"
        v-for="(item,i) in config.children" :key="i">
      </component>
    </template>
  </VDropdown>
</template>

<script setup lang="ts">
import {defineProps, reactive} from "vue";

const props = defineProps({
  properties: {
    type: Object,
    default(){
      return {}
    }
  }
});

const config = reactive({
  title: '',
  icon: '',
  type: '',
  children: []
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'

export default {
  name: 'gDropDown',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
