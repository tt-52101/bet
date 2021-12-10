import RestRepo from '/@src/generated/repositories/RestRepo.js'
import StateRepo from '/@src/generated/repositories/StateRepo.js'

class Repository {
  constructor(props, default_value = null) {
    if (props.name === 'restRepo') {
      return new RestRepo(props, default_value)
    }

    if (props.name === 'stateRepo') {
      return new StateRepo(props, default_value)
    }
  }
}


export default Repository;
