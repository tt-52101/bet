import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import { useStorage } from '@vueuse/core'

export type UserData = Record<string, any> | null

export const useUserSession = defineStore('userSession', () => {
  const token = useStorage('token', {
    access: '',
    refresh: ''
  })
  const user = ref<Partial<UserData>>()
  const loading = ref(true)

  const isLoggedIn = computed(
    () => token.value.access !== undefined && token.value.access !== ''
  )

  function setUser(newUser: Partial<UserData>) {
    user.value = newUser
  }

  function setToken(accessToken: string, refreshToken: string) {
    token.value = {
      access: accessToken,
      refresh: refreshToken
    }
  }

  function setLoading(newLoading: boolean) {
    loading.value = newLoading
  }

  async function logoutUser() {
    token.value = {
      access: '',
      refresh: ''
    }
    user.value = undefined
  }

  return {
    user,
    token,
    isLoggedIn,
    loading,
    logoutUser,
    setUser,
    setToken,
    setLoading,
  } as const
})
