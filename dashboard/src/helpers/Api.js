import axios from "axios";
import {useUserSession} from "../stores/userSession";

class Api {
  constructor(name, authorized = true, session = useUserSession()) {

    let server = import.meta.env.VITE_API_BASE_URL;
    console.log(server);
    this.server = server;
    this.endpoint = `${name}`;
    this.headers = {};

    if (authorized) {
      axios.defaults.headers.common["authorization"] =
        "Bearer " + session.token.access;
    }
  }

  get(filters = {}, page = 1, url = "", other_domain = false) {
    let params = this.genParams(filters, page);
    if (!other_domain) {
      url = this.getUrl(url);
    }

    return axios({
      url: url + params,
      method: "get",
      headers: this.headers
    });
  }

  post(data = {}, filters = {}, url = "", other_domain = false) {
    let params = this.genParams(filters, 1);
    if (!other_domain) {
      url = this.getUrl(url);
    }
    return axios({
      url: url + params,
      data: data,
      method: "post",
      headers: this.headers
    });
  }

  upload(data = {}, url = "", other_domain = false) {
    if (!other_domain) {
      url = this.getUrl(url);
    }

    return axios.post(url, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  }

  update(data = {}, id = "", filters = {}, url = "", other_domain = false) {
    let params = this.genParams(filters, 1);

    if (!other_domain) {
      url = this.getUrl(url) + `/${id}`;
    }

    data["_method"] = "PATCH";

    return axios.patch(url + params, data);
  }

  delete(id, url = "", other_domain = false) {
    let data = {
      _method: "DELETE"
    };
    if (!other_domain) {
      url = this.getUrl(url) + "/" + id;
    }

    return axios({
      url: url,
      data: data,
      method: "post",
      headers: this.headers
    });
  }

  getUrl(url, server = "") {
    if (!url) {
      return this.server + this.endpoint;
    }
    return this.server + url;
  }

  genParams(filters, page = null) {
    var get = "?";

    if (page) {
      get += `page=${page}&`;
    }

    Object.keys(filters).forEach(k => {
      if (filters[k]) {
        get += k + "=" + filters[k] + "&";
      }
    });

    return get;
  }
}

export default Api;
