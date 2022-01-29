<template>
  <VDropdown right spaced class="user-dropdown profile-dropdown">
    <template #button="{ toggle }">
      <a
        class="is-trigger dropdown-trigger"
        aria-haspopup="true"
        @click="toggle"
      >
        <VAvatar picture="/images/avatars/svg/vuero-1.svg" />
      </a>
    </template>

    <template #content>
      <div class="dropdown-head">
        <VAvatar size="large" picture="/images/avatars/svg/vuero-1.svg" />

        <div class="meta">
          <span>Username</span>
          <span>email</span>
        </div>
      </div>

      <router-link to="/pages/auth/profile" role="menuitem" class="dropdown-item is-media">
        <div class="icon">
          <i aria-hidden="true" class="lnil lnil-user-alt"></i>
        </div>
        <div class="meta">
          <span>Profile</span>
          <span>View your profile</span>
        </div>
      </router-link>

      <hr class="dropdown-divider" />

      <hr class="dropdown-divider" />

      <div class="dropdown-item is-button">
        <VButton
          class="logout-button"
          icon="feather:log-out"
          color="primary"
          role="menuitem"
          raised
          fullwidth
          @click="logout"
        >
          Logout
        </VButton>
      </div>
    </template>
  </VDropdown>
</template>

<script setup lang="ts">
import Auth from '/@src/repositories/Auth'
import {useUserSession} from '/@src/stores/userSession'
import {useRouter, useRoute} from 'vue-router'
import useNotyf from "/@src/composable/useNotyf";

const router = useRouter()
const userSession = useUserSession();
const auth = new Auth();
const notif = useNotyf()

const logout = (() => {
  auth.logout().then(response => {
    userSession.logoutUser();
    router.push('/auth/login')
  }).catch(err => {
    notif.error(err.response.data.message)
  })
})
</script>
