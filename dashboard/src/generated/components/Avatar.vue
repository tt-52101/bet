<template>
  <vAvatar
    :picture="config.picture"
    :badge="config.badge"
    :initials="initials(config.initials)"
    :size="config.size"
    :squared="config.squared"
    :dot-color="config.dot_color"
    :dot="config.dot"
    :color="config.color">
    {{ config.title }}
  </vAvatar>
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
  picture: '',
  badge: '',
  initials: '',
  size: '',
  color: '',
  dot_color: '',
  squared: false,
  dot: false,
})

onMounted(() => {
  config.value = apply(props.properties, config, props.scope)
})

function initials(text: string) {
  const names = text.split(' ');
  let init = names[0].substring(0, 1).toUpperCase();

  if (names.length > 1) {
    init += names[names.length - 1].substring(0, 1).toUpperCase();
  }
  return init;
};

</script>

<script lang="ts">
export default {
  name: 'gAvatar'
}
</script>
