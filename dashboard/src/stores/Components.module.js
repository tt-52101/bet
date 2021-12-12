import _ from 'lodash';

export const alert = {
  namespaced: true,
  state: {
    last_event_id: 0,
    events: [],
    data: {},
  },
  actions: {
    newEvent({ commit }, payload) {
      commit("pushEvent", payload);
    },
    bind({ commit }, payload) {
      commit("bind", payload);
    },
    clearTopic({ commit }, name) {
      commit("clearTopic", name);
    },
    clearEvents({commit}) {
      commit("clearEvents");
    }
  },
  mutations: {
    clearTopic(state, name){
      state.events = state.events.filter(el => {
        el.topic !== name
      })
    },
    clearEvents(state) {
      state.last_event_id = 0;
      state.events = []
    },
    pushEvent(state, payload) {
      state.last_event_id +=1;
      payload.id = state.last_event_id;
      state.events.push(payload);
      if(state.events.length >= 2) {
        state.events.shift();
      }
    },
    bind(state, payload) {
      _.set(state.data, payload.key, payload.value)
    }
  },
  getters: {
    events(state) {
      return state.events;
    },
    data(state) {
      return state.data;
    },
    last_event_id(state) {
      return state.last_event_id;
    }
  }
};

export default alert;
