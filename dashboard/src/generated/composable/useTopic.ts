import Topic from "/@src/generated/repositories/Topic";
import Repository from "/@src/generated/repositories/Repository";
import StateInterface from "/@src/generated/interfaces/StateInterface";
import {ref} from "vue";

export default class useTopic {
  state: StateInterface

  init(config: any) {
    this.state = new Repository(config)
  }

  listen = () :any => {
    if(this.state){
      return this.state.get()
    }
    return ref({})
  }

  publish = (value: any) => {
    this.state.set(value)
  }
}
