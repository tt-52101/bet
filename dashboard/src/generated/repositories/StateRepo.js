import store from '/@src/stores/GlobalStore'
import _ from 'lodash';

class StateRepo {
  constructor(props , default_value = null) {
    this.key = props.key

    if(default_value) {
      this.set(default_value)
    }
  }

  set(value) {
    store.commit('components/bind', {
      key: this.key,
      value: value
    })
  }

  get() {
    const result = store.getters['components/data']
    return _.get(result, this.key)
  }
}

export default StateRepo;
