import lodash from 'lodash';

const _ = lodash;

const Properties = {
  data(){
    return {
      context: {}
    }
  },
  methods: {
    apply(properties: any) {
      Object.keys(properties).forEach((el) => {
        _.set(this.config, el, this.processString(properties[el]))
      });
    },
    processString(prop: any) {
      let text = JSON.parse(JSON.stringify(prop))
      if (typeof text === 'string') {
        Object.keys(this.context).forEach(k => {
          text = text.replace(`$${k}`, _.get(this.context, k))
        })
      } else if (typeof text === 'object') {
        text = this.processObject(text)
      }

      return text
    },
    processObject(prop: any) {
      const text = JSON.parse(JSON.stringify(prop))
      Object.keys(text).forEach(k => {
        if (text[k]) {
          text[k] = this.processString(text[k])
        }
      })
      return text
    }
  }
}

export default Properties;
