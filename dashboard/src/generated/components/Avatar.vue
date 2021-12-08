<template>
 <vAvatar
   :picture="config.picture"
   :badge="config.badge"
   :initials="config.initials"
   :size="config.size"
   :squared="config.squared"
   :dot-color="config.dot_color"
   :dot="config.dot"
   :color="config.color">
   {{config.title}}
 </vAvatar>
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
  picture: '',
  badge: '',
  initials: '',
  size: '',
  color: '',
  dot_color: '',
  squared: false,
  dot: false,
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
export default {
  name: 'gAvatar',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
