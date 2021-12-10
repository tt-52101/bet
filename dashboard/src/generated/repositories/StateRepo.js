import store from '/@src/stores/GlobalStore'
import _ from 'lodash';

class StateRepo {
  constructor(props) {
    this.key = props.key
  }

  set(value) {
    store.commit('components/bind', {
      key: this.key,
      value: value
    })
  }

  get(key) {
    const result = store.getters['components/data']
    return _.get(result, this.key)
  }
}

export default StateRepo;
