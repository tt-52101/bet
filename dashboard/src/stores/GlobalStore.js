import { createStore } from 'vuex'
import components from "/@src/stores/Components.module"

const store = createStore({
  modules: {
    components
  }
})

export default store;
