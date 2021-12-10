<template>
  <VField :addons="config.addons.length > 0">
    <VControl
      :expanded="config.addons.length > 0"
      :has-error="config.error === true"
      :icon="config.icon">
      <input
        v-model="value"
        type="text"
        :class="classes"
        :disabled="config.disabled"
        :placeholder="config.placeholder"
      />
    </VControl>
    <VControl v-if="config.addons.length > 0">
      <component
        :is="item.component"
        :properties="item.props"
        :scope="scope"
        v-for="(item,i) in config.addons" :key="i">
      </component>
    </VControl>
  </VField>
</template>

<script setup lang="ts">
import {computed, defineProps, reactive} from "vue";

// Props
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
})

const config = reactive({
  value: 'test',
  rounded: false,
  focus: '',
  help: '',
  placeholder: '',
  disabled: false,
  error: false,
  icon: '',
  addons: []
})

const value = computed({
  get(): IBook {
    return config.value
  },
  set(value): void {
    config.value = value
  },
});

const classes = computed(() => {
  let classes: any = {
    input: true,
    'is-rounded': config.rounded
  }

  const focus = `is-${config.focus}-focus`
  classes[focus] = true;

  return classes
})

</script>

<script lang="ts">
import Properties from '/@src/generated/mixins/Properties'
import {computed, reactive} from "vue";

export default {
  name: 'gInput',
  mixins: [Properties],
  mounted() {
    this.apply(this.properties)
  },
  scope: {
    type: Object,
    default() {
      return {}
    }
  }
}
</script>
