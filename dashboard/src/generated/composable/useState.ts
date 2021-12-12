import axios from 'axios'
import {useUserSession} from "/@src/stores/userSession";
import StateRepo from "/@src/generated/repositories/StateRepo";
import {computed} from "vue";

export default function useState() {

  const getData = (name: string) => {
    const state = new StateRepo({key: name})
    return state.get()
  }

  const setData = (name: string, value: any) => {
    const state = new StateRepo({key: name})
    return state.set(value)
  }

  return {
    getData,
    setData,
  }
}
