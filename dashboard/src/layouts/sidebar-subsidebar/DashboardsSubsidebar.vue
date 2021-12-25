<script setup lang="ts">
const emit = defineEmits(['close'])
</script>

<template>
  <div class="sidebar-panel is-generic">
    <div class="subpanel-header">
      <h3 class="no-mb">Dashboards</h3>
      <div class="panel-close" @click="emit('close')">
        <i aria-hidden="true" class="iconify" data-icon="feather:x"></i>
      </div>
    </div>
    <div class="inner" data-simplebar>
      <ul>
        <li>
          <RouterLink :to="{ name: 'app' }">
            <i aria-hidden="true" class="lnil lnil-home pr-2"></i>
            Home
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/user' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Users
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/championship' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Championship
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/fixture' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Fixtures
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/country' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Countries
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/league' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Leagues
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/team' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Teams
          </RouterLink>
        </li>
        <li>
          <RouterLink :to="{ path: '/pages/auth/bookmaker' }">
            <i aria-hidden="true" class="lnil lnil-cogs pr-2"></i>
            Bookmakers
          </RouterLink>
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss">
@import '../../scss/layout/_sidebar-panel.scss';
</style>
