import store from '/@src/stores/GlobalStore'

class EventRepo {
  topic: string

  listen(topic: string) {
    this.topic = topic
  }

  publish(action: string, value: any, topic = this.topic) {
    store.dispatch("components/newEvent", {
      topic: topic,
      action: action,
      payload: value,
    });
  }

  lastEvent(): any {
    const events: any = store.getters["components/events"]

    const topic_events: any = events.filter(el => {
      return el.topic === this.topic
    })

    return topic_events[topic_events.length - 1];
  }

  clearAll(): any {
    store.dispatch("components/clearAll")
  }

  lastId(): any {
    return store.getters["components/last_event_id"]
  }
}

export default EventRepo;
