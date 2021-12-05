import axios from "axios";


class Api {
  constructor(name, authorized = true, server = "") {

    if (!server) {
      server ='http://localhost/auth';
    }

    this.server = server;
    this.endpoint = `${name}`;
    this.headers = {};
  }

  get(filters = {}, page = 1, url = "", custom_url = false) {
    let params = this.genParams(filters, page);
    if (!custom_url) {
      url = this.getUrl(url);
    }

    return axios({
      url: url + params,
      method: "get",
      headers: this.headers
    });
  }

  post(data = {}, filters = {}, url = "", custom_url = false) {
    let params = this.genParams(filters, 1);
    if (!custom_url) {
      url = this.getUrl(url);
    }
    return axios({
      url: url + params,
      data: data,
      method: "post",
      headers: this.headers
    });
  }

  upload(data = {}, url = "", custom_url = false) {
    if (!custom_url) {
      url = this.getUrl(url);
    }

    return axios.post(url, data, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  }

  update(data = {}, id = "", filters = {}, url = "", custom_url = false) {
    let params = this.genParams(filters, 1);

    if (!custom_url) {
      url = this.getUrl(url) + `/${id}`;
    }

    data["_method"] = "PATCH";

    return axios.patch(url + params, data);
  }

  updateMany(data = {}, url = "", custom_url = false) {
    data["_method"] = "PATCH";
    if (!custom_url) {
      url = this.getUrl(url);
    }
    return axios.patch(url, data);
  }

  delete(id, url = "", custom_url = false) {
    let data = {
      _method: "DELETE"
    };
    if (!custom_url) {
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
