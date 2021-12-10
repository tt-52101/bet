import Api from '/@src/helpers/Api'

class RestRepo {
  constructor(props) {
    this.api  = new Api(props.url)
  }

  async get() {
    return new Promise((resolve, reject) => {
      this.api.get().then(response => {
        resolve(response.data)
      }).catch(err => {
        reject(err)
      })
    })
  }

}


export default RestRepo;
