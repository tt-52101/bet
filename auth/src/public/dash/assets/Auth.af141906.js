import { A as Api } from "./index.c92bb4bd.js";
const default_server = "http://localhost/auth";
class Auth {
  login(username, password) {
    const options = {
      endpoint: "/api/login",
      params: {
        email: username,
        password
      }
    };
    const client = new Api("user", false, default_server);
    return client.post(options.params, {}, options.endpoint);
  }
  logout(username, password) {
    const options = {
      endpoint: "/api/logout",
      params: {
        email: username,
        password
      }
    };
    const client = new Api("user", false, default_server);
    return client.post(options.params, {}, options.endpoint);
  }
}
export { Auth as A };
