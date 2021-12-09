<template>
  <a href="#" :class="classes">
    <div class="icon" v-if="config.icon">
      <i :class="config.icon"></i>
    </div>
    <img v-else-if="config.image" class="item-img" :src="config.image" alt="" />
    <div class="meta">
      <component
        :is="item.component"
        :properties="item.props"
        v-for="(item,i) in config.meta" :key="i">
      </component>
    </div>
  </a>
</template>
<script setup lang="ts">
import {computed, defineProps, reactive} from "vue";

const props = defineProps({
  properties: {
    type: Object,
    default(){
      return {}
    }
  }
});

const config = reactive({
  is_media: true,
  icon: '',
  image: '',
  meta: []
})

const classes = computed(()=>  {
  let classes: any =  {
    'dropdown-item': true,
    'is-media': config.is_media,
  }

  return classes
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'

export default {
  name: 'gDropDownItem',
  mixins: [Properties],
  mounted(){
    this.apply(this.properties)
  }
}
</script>
