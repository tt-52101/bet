import store from '/@src/stores/GlobalStore'
import StateInterface from "../interfaces/StateInterface"

import _ from 'lodash';

class StateRepo implements StateInterface {
  key: string

  constructor(props: any, default_value: any = null) {
    this.key = props.key

    if (default_value) {
      this.set(default_value)
    }
  }

  set(value: any) {
    store.commit('components/bind', {
      key: this.key,
      value: value
    })
  }

  select(value: any, identifier: string) {
    store.commit('components/select', {
      key: this.key,
      identifier: identifier,
      value: value
    })
  }

  get(): any {
    let result = store.getters['components/data']
    return _.get(result, this.key)
  }
}

export default StateRepo;
