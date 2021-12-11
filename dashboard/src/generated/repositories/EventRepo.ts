import store from '/@src/stores/GlobalStore'

class EventRepo {
  listen: string

  constructor(props: any) {
    this.listen = props.listen
  }

  publish(action: string, value: any, topic = this.listen) {
    store.dispatch("components/newEvent", {
      topic: topic,
      action: action,
      payload: value,
    });
  }

  lastEvent(): any {
    const events: any = store.getters["components/events"]

    const topic_events: any = events.filter(el => {
      return el.topic === this.listen
    })

    return topic_events[topic_events.length - 1];
  }
}

export default EventRepo;
