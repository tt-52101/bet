import Flex from '/@src/generated/components/Flex.vue'
import FlexItem from '/@src/generated/components/FlexItem.vue'
import Card from '/@src/generated/components/Card.vue'
import Row from '/@src/generated/components/Row.vue'
import Column from '/@src/generated/components/Column.vue'
import Button from '/@src/generated/components/Button.vue'
import ButtonGroup from '/@src/generated/components/ButtonGroup.vue'
import Avatar from '/@src/generated/components/Avatar.vue'
import DropDown from '/@src/generated/components/DropDown.vue';
import DropDownItem from '/@src/generated/components/DropDownItem.vue';
import Text from '/@src/generated/components/Text.vue';
import Builder from '/@src/generated/components/Builder.vue';
import Input from '/@src/generated/components/Input.vue';
import Form from '/@src/generated/components/Form.vue';
import Pagination from '/@src/generated/components/Pagination.vue';
import Modal from '/@src/generated/components/Modal.vue';

const GlobalComponents = {
  install(app: any) {
    app.component(Card.name, Card)
    app.component(Flex.name, Flex)
    app.component(FlexItem.name, FlexItem)
    app.component(Row.name, Row)
    app.component(Column.name, Column)
    app.component(Button.name, Button)
    app.component(ButtonGroup.name, ButtonGroup)
    app.component(Avatar.name, Avatar)
    app.component(DropDown.name, DropDown)
    app.component(DropDownItem.name, DropDownItem)
    app.component(Text.name, Text)
    app.component(Builder.name, Builder)
    app.component(Input.name, Input)
    app.component(Form.name, Form)
    app.component(Pagination.name, Pagination)
    app.component(Modal.name, Modal)
  }
}


export default GlobalComponents;
