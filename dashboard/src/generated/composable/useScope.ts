export function useScope(scope: any) {

  // Replace Variables With Scope Values
  const process = (text: any) => {
    if (typeof text === 'string') {
      Object.keys(scope).forEach(k => {
        text = text.replace(`$${k}`, scope[k]);
      })
      return text;
    }

    if (typeof text === 'object') {
      text = processObject(text)
    }

    return text
  }

  const processObject = (prop: any) => {
    const text = JSON.parse(JSON.stringify(prop))
    Object.keys(text).forEach(k => {
      if (text[k]) {
        text[k] = process(text[k])
      }
    })
    return text
  }

  return {
    process,
    processObject
  }
}
