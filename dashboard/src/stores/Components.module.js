import _ from 'lodash';

export const alert = {
  namespaced: true,
  state: {
    last_event_id: 0,
    events: [],
    data: {},
  },
  actions: {
    newEvent({commit}, payload) {
      commit("pushEvent", payload);
    },
    bind({commit}, payload) {
      commit("bind", payload);
    },
    push({commit}, payload) {
      commit("push", payload);
    },
    clearTopic({commit}, name) {
      commit("clearTopic", name);
    },
    clearEvents({commit}) {
      commit("clearEvents");
    },
    clearAll({commit}) {
      commit("clearEvents");
      commit("clearData");
    }
  },
  mutations: {
    clearTopic(state, name) {
      state.events = state.events.filter(el => {
        el.topic !== name
      })
    },
    clearEvents(state) {
      state.last_event_id = 0;
      state.events = []
    },
    clearData(state) {
      state.data = {}
    },
    pushEvent(state, payload) {
      state.last_event_id += 1;
      payload.id = state.last_event_id;
      state.events.push(payload);
      if (state.events.length >= 2) {
        state.events.shift();
      }
    },
    select: (state, payload) => {
      let selected = _.get(state.data, payload.key)
      const identifier = payload.identifier
      if(!selected) {
        selected = []
      }

      const index = selected.findIndex(el => {
        return (el[identifier] === payload.value[identifier])
      })

      if (index > -1) {
        selected.splice(index, 1)
      } else {
        selected.push(payload.value)
      }

      _.set(state.data, payload.key, selected)
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
