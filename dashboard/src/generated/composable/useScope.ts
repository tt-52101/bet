
export function useScope(scope: any) {

  // Replace $Variables With Scope Values
  const process = (text: any) => {
    Object.keys(scope).forEach(k => {
      text = text.replace(`$${k}`, scope[k]);
    })
    return text
  }

  return {
    process
  }
}
