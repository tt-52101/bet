<script setup lang="ts">
import {computed, defineEmits} from 'vue'
import {useRoute, RouteLocationOptions} from 'vue-router'
import {useI18n} from 'vue-i18n'

export interface VFlexPaginationProps {
  itemPerPage: number
  totalItems: number
  currentPage?: number
  maxLinksDisplayed?: number
}

const emit = defineEmits(['change'])

const props = withDefaults(defineProps<VFlexPaginationProps>(), {
  currentPage: 1,
  maxLinksDisplayed: 4,
  itemsPerPage: 8,
  totalItems:0
})

const {t} = useI18n()
const route = useRoute()
const lastPage = computed(
  () => Math.ceil(props.totalItems / props.itemPerPage) || 1
)
const totalPageDisplayed = computed(() =>
  lastPage.value > props.maxLinksDisplayed - 2
    ? props.maxLinksDisplayed - 2
    : lastPage.value
)
const pages = computed(() => {
  const _pages = []
  let firstButton = props.currentPage - Math.floor(totalPageDisplayed.value / 2)
  let lastButton =
    firstButton +
    (totalPageDisplayed.value - Math.ceil(totalPageDisplayed.value % 2))

  if (firstButton < 1) {
    firstButton = 1
    lastButton = firstButton + (totalPageDisplayed.value - 1)
  }

  if (lastButton > lastPage.value) {
    lastButton = lastPage.value
    firstButton = lastButton - (totalPageDisplayed.value - 1)
  }

  for (let page = firstButton; page <= lastButton; page += 1) {
    if (page === firstButton || page === lastButton) {
      continue
    }

    _pages.push(page)
  }

  return _pages
})

const showFirstLink = computed(() => pages.value[0] > 1)
const showLastLink = computed(
  () => pages.value[pages.value.length - 1] < lastPage.value
)

function changePage(page: number) {
  if(page <= lastPage.value && page > 0) {
    emit('change', page)
  }
}

const paginatedLink = (page = 1) => {
  const _page = Math.min(page, lastPage.value)
  const query = {
    ...route.query,
    page: _page <= 1 ? undefined : _page,
  }

  return {
    name: route.name,
    params: route.params,
    query,
  } as RouteLocationOptions
}
</script>

<i18n lang="yaml">
de:
  goto-page-title: 'Gehe zu Seite {page}'
en:
  goto-page-title: 'Goto page {page}'
es-MX:
  goto-page-title: 'Ir a la página {page}'
es:
  goto-page-title: 'Ir a la página {page}'
fr:
  goto-page-title: 'Aller à la page {page}'
zh-CN:
  goto-page-title: '转到第{page}页'
</i18n>

<template>
  <nav
    role="navigation"
    class="flex-pagination pagination is-rounded"
    aria-label="pagination"
    data-filter-hide
  >
    <div
      v-if="lastPage > 1"
      @click="changePage(currentPage - 1)"
      class="pagination-previous has-chevron"
    >
      <i
        aria-hidden="true"
        class="iconify"
        data-icon="feather:chevron-left"
      ></i>
    </div>
    <div
      v-if="lastPage > 1"
      @click="changePage(currentPage + 1)"
      class="pagination-next has-chevron"
    >
      <i
        aria-hidden="true"
        class="iconify"
        data-icon="feather:chevron-right"
      ></i>
    </div>

    <ul class="pagination-list">
      <li>
        <div
          @click="changePage(1)"
          class="pagination-link"
          :aria-label="t('goto-page-title', { page: 1 })"
          :class="[currentPage === 1 && 'is-current']"
        >
          1
        </div>
      </li>

      <li v-if="pages.length === 0 || pages[0] > 2">
        <span class="pagination-ellipsis">…</span>
      </li>

      <li v-for="page in pages" :key="page">
        <div
          :class="[currentPage === page && 'is-current']"
          class="pagination-link"
          @click="changePage(page)">
          {{ page }}
        </div>
      </li>

      <li v-if="pages[pages.length - 1] < lastPage - 1">
        <span class="pagination-ellipsis">…</span>
      </li>

      <li>
        <div
          @click="changePage(lastPage)"
          class="pagination-link"
          :class="[currentPage === lastPage && 'is-current']"
        >
          {{ lastPage }}
        </div>
      </li>
    </ul>
  </nav>
</template>
