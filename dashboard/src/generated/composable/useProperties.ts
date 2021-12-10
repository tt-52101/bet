import _ from 'lodash'
import {defineProps} from "vue";

export default function useProperties() {

  const apply = (properties: any, config: any, scope: any = {}) => {
    Object.keys(properties).forEach((el) => {
      _.set(config, el, replaceVarInString(properties[el], scope))
    });

    return config
  }

  const replaceVarInString = (prop: any, scope: any) => {
    let text = JSON.parse(JSON.stringify(prop))
    if (typeof text === 'string') {
      Object.keys(scope).forEach(k => {
        text = text.replace(`$${k}`, _.get(scope, k))
      })
    } else if (typeof text === 'object') {
      text = replaceVarInObject(prop, scope)
    }
    return text
  }

  const replaceVarInObject = (prop: any, scope: any) =>{
    const text = JSON.parse(JSON.stringify(prop))
    Object.keys(text).forEach(k => {
      if (text[k]) {
        text[k] = replaceVarInString(text[k], scope)
      }
    })
    return text
  }

  return {
    apply
  }
}

