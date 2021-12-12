import Api from '/@src/helpers/Api'
import StateInterface from "../interfaces/StateInterface"

class RestRepo implements StateInterface {
  api: any

  constructor(props: any, default_value: any = null) {
    this.api = new Api(props.url)
  }

  async get() {
    return new Promise((resolve, reject) => {
      this.api.get().then((response: any) => {
        resolve(response.data)
      }).catch((err: any) => {
        reject(err)
      })
    })
  }

  set(value: any) {
    // Todo Implement Create
  }

}


export default RestRepo;
