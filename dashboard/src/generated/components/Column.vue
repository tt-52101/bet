<template>
  <div :class="classes">
    <component
      :is="item.component"
      :properties="item.props"
      :scope="scope"
      v-for="(item,i) in properties.children" :key="i">
    </component>
  </div>
</template>

<script setup lang="ts">
import {defineProps, computed, reactive} from "vue";

const props = defineProps({
  properties: {
    type: Object,
    default(){
      return {}
    }
  },
  scope: {
    type: Object,
    default(){
      return {}
    }
  }
});

const config = reactive({
  mobile: 12,
  tablet: 12,
  desktop: 12
})

const classes = computed(()=>  {
  let classes: any =  {
    column: true,
  }

  const mobile = `is-${config.mobile}-mobile`
  classes[mobile] = true;

  const tablet = `is-${config.tablet}-tablet`
  classes[tablet] = true;

  const desktop = `is-${config.desktop}-desktop`
  classes[desktop] = true;

  return classes
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gCol',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
