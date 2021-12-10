import _ from 'lodash'
import {onMounted} from "vue";

export function apply(properties: any, config: any, scope: any = {}) {
  Object.keys(properties).forEach((el) => {
    _.set(config, el, process(properties[el], scope))
  });

  return config
}

export function process(prop: any, scope: any) {
  let text = JSON.parse(JSON.stringify(prop))
  if (typeof text === 'string') {
    Object.keys(scope).forEach(k => {
      text = text.replace(`$${k}`, _.get(scope, k))
    })
  } else if (typeof text === 'object') {
    text = processObject(prop, scope)
  }
  return text
}

export function processObject(prop: any, scope: any) {
  const text = JSON.parse(JSON.stringify(prop))
  Object.keys(text).forEach(k => {
    if (text[k]) {
      text[k] = process(text[k], scope)
    }
  })
  return text
}
