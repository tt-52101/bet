import Api from '/@src/helpers/Api'

const default_server = 'http://localhost/auth'

export default class Auth {

  login(username, password){

    const options = {
      endpoint: '/api/login',
      params: {
        email: username,
        password: password
      }
    }

    const client = new Api('user', false, default_server)
    return client.post(options.params,{}, options.endpoint);
  }

  logout(username, password){

    const options = {
      endpoint: '/api/logout',
      params: {
        email: username,
        password: password
      }
    }

    const client = new Api('user', false, default_server)
    return client.post(options.params,{}, options.endpoint);
  }
}
