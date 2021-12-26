import axios from 'axios'
import {useUserSession} from "/@src/stores/userSession";

export default function useApi() {

  const session = useUserSession()

  const get = (url: string, params: any = {}, authenticated: boolean = true) => {
    const get = genParams(params)

    return axios({
      url: `${url}${get}`,
      method: 'get',
      headers: getHeaders(authenticated)
    })
  }

  const post = (url: string, data: any, params: any = {}, authenticated: boolean = true) => {
    const get = genParams(params)

    return axios({
      url: `${url}${get}`,
      data: data,
      method: 'POST',
      headers: getHeaders(authenticated)
    })
  }

  const del = (url: string, data: any, params: any = {}, authenticated: boolean = true) => {
    const get = genParams(params)

    return axios({
      url: `${url}${get}`,
      data: data,
      method: 'delete',
      headers: getHeaders(authenticated)
    })
  }

  const update = (url: string, data: any, params: any = {}, authenticated: boolean = true) => {
    const get = genParams(params)

    data['_method'] = 'PATCH'

    return axios({
      url: `${url}${get}`,
      data: data,
      method: 'post',
      headers: getHeaders(authenticated)
    })
  }

  const getHeaders = (authorized: boolean = true) => {
    const headers: any = {}
    if (authorized) {
      headers.authorization = `Bearer ${session.token.access}`
    }
    return headers
  }

  const genParams = (params: any, page: number | null = null) => {
    let get = "?";

    if (!params) {
      return get;
    }

    if (page) {
      get += `page=${page}&`;
    }

    Object.keys(params).forEach(k => {
      if (params[k]) {
        get += k + "=" + params[k] + "&";
      }
    });

    return get
  }

  return {
    get,
    post,
    del,
    update,
  }
}
