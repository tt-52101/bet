import RestRepo from '/@src/generated/repositories/RestRepo'
import StateRepo from '/@src/generated/repositories/StateRepo'

class Repository {
  constructor(props: any, default_value: any = null) {
    if (props.name === 'restRepo') {
      return new RestRepo(props, default_value)
    }

    if (props.name === 'stateRepo') {
      return new StateRepo(props, default_value)
    }
  }
}


export default Repository;
