import {computed, reactive, ref, watch} from "vue";
import EventRepo from "/@src/generated/repositories/EventRepo";
import _ from 'lodash'

export default function useEvents() {

  const events = new EventRepo()
  const last_event_id = ref(events.lastId())

  let actions: any = reactive({})

  const listenTopic = (config: any) => {
    events.listen(config.key)
  }

  const last_event = computed(() => {
    return events.lastEvent()
  })

  const publish = function (action: any, value: any, topic: string) {
    events.publish(action, value, topic)
  }

  const action = function action(name: string, callback: any) {
    _.set(actions, name, callback)
  }

  const clearAll = function (){
    events.clearAll()
  }

  const callAction = (event: any) => {
    if (!event || event.id == last_event_id.value) {
      return
    }

    last_event_id.value = event.id
    actions[event.action](event.payload)
  }

  const listen = watch(
    last_event,
    (newEvent) => {
      callAction(newEvent);
    },
    {
      immediate: false,
      deep: true
    }
  )

  return {
    listen,
    last_event,
    listenTopic,
    action,
    callAction,
    publish,
    clearAll
  }
}
