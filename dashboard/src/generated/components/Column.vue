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
import {defineProps, computed, reactive, onMounted} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
const {apply} = useProperties();

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

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
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
export default {
  name: 'gCol'
}
</script>
