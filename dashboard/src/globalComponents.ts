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
import View from '/@src/generated/components/View.vue';
import Table from '/@src/generated/components/Table.vue';
import TableRow from "/@src/generated/components/TableRow.vue";
import TableColumn from "/@src/generated/components/TableColumn.vue";
import Selectable from "/@src/generated/components/Selectable.vue";
import Route from "/@src/generated/components/Route.vue";
import Select from "/@src/generated/components/Select.vue";
import Tabs from "/@src/generated/components/Tabs.vue";
import BreadCrumb from "/@src/generated/components/BreadCrumb.vue";
import Accordion from "/@src/generated/components/Accordion.vue";
import Datepicker from "/@src/generated/components/Datepicker.vue";
import Switch from "/@src/generated/components/Switch.vue";
import Progress from "/@src/generated/components/Progress.vue";
import AvatarStack from "/@src/generated/components/AvatarStack.vue";
import Block from "/@src/generated/components/Block.vue";

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
    app.component(View.name, View)
    app.component(Table.name, Table)
    app.component(TableRow.name, TableRow)
    app.component(TableColumn.name, TableColumn)
    app.component(Selectable.name, Selectable)
    app.component(Route.name, Route)
    app.component(Select.name, Select)
    app.component(Tabs.name, Tabs)
    app.component(BreadCrumb.name, BreadCrumb)
    app.component(Accordion.name, Accordion)
    app.component(Datepicker.name, Datepicker)
    app.component(Switch.name, Switch)
    app.component(Progress.name, Progress)
    app.component(AvatarStack.name, AvatarStack)
    app.component(Block.name, Block)
  }
}


export default GlobalComponents;
