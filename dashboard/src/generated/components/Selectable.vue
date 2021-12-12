<template>
  <div>
    <div class="columns is-multiline">
      <div class="column is-2" v-for="option in config.options" @click="select(option)">
        <VCard radius="small" :color="isSelected(option) ? 'success': 'primary'">
          <p class="is-bold">
            {{ option[config.label] }}
          </p>
        </VCard>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {computed, defineProps, onMounted, reactive} from "vue";
import useProperties from "/@src/generated/composable/useProperties";
import useState from "/@src/generated/composable/useState";

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
  identifier: 'id',
  label: 'title',
  options: []
})

onMounted(() => {
  config.value = apply(props.properties, config)
})

const {select: selectItem, getData} = useState()

function select(item: any) {
  selectItem(config.name, config.identifier, item)
}

function isSelected(option: any) {
  if (typeof selected.value === 'undefined') {
    return false
  }
  const index = selected.value.findIndex(el => {
    return (el[config.identifier] === option[config.identifier])
  })

  return index > -1
}

const selected = computed({
  get() {
    return getData(config.name)
  },

});
</script>

<script lang="ts">
export default {
  name: 'gSelectable'
}
</script>
