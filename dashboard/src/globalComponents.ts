import Flex from '/@src/generated/components/Flex.vue'
import FlexItem from '/@src/generated/components/FlexItem.vue'
import Card from '/@src/generated/components/Card.vue'
import Row from '/@src/generated/components/Row.vue';
import Column from '/@src/generated/components/Column.vue';

const GlobalComponents = {
  install(app) {
    app.component(Card.name, Card)
    app.component(Flex.name, Flex)
    app.component(FlexItem.name, FlexItem)
    app.component(Row.name, Row)
    app.component(Column.name, Column)
  }
}


export default GlobalComponents;
