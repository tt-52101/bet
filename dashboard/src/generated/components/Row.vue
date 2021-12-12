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
import {computed, defineProps, onMounted, reactive, toRefs} from "vue";
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
  multiline: true,
  mobile: 3,
  tablet: 3,
  desktop: 3
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

const classes = computed(()=>  {
  let classes: any =  {
    columns: true,
    'is-multiline': config.multiline,
    'is-variable':  true,
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
  name: 'gRow'
}
</script>
