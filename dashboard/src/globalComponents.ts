import Flex from '/@src/generated/components/Flex.vue'
import FlexItem from '/@src/generated/components/FlexItem.vue'
import Card from '/@src/generated/components/Card.vue'

const GlobalComponents = {
  install(app) {
    app.component(Card.name, Card)
    app.component(Flex.name, Flex)
    app.component(FlexItem.name, FlexItem)

  }
}


export default GlobalComponents;
