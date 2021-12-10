import RestRepo from '/@src/generated/repositories/RestRepo.js'
import StateRepo from '/@src/generated/repositories/StateRepo.js'

class Repository {
  constructor(props) {
    if (props.name === 'restRepo') {
      return new RestRepo(props)
    }

    if (props.name === 'stateRepo') {
      return new StateRepo(props)
    }
  }
}


export default Repository;
