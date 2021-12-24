<template>
  <VAvatarStack :avatars="avatars" :size="config.size"/>
</template>

<script setup lang="ts">
import {defineProps, onMounted, computed, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";

const {apply} = useProperties();

const props = defineProps({
  properties: {
    type: Object,
    default() {
      return {}
    }
  }
});

const config = reactive({
  size: 'small',
  items: []
})

onMounted(() => {
  config.value = apply(props.properties, config)
})

const avatars = computed(() => {
  return config.items.map((item: any) => {
    return item.props
  })
});
</script>

<script lang="ts">
export default {
  name: 'gAvatarStack'
}
</script>
