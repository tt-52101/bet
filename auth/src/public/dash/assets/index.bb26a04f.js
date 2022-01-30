import { _ as _sfc_main$1 } from "./AppLayout.46013c7b.js";
import { d as defineComponent, ac as useRoute, $ as reactive, a0 as onMounted, a5 as watch, k as resolveComponent, o as openBlock, C as createBlock, s as withCtx, q as createVNode, b as createElementBlock, a1 as renderList, Z as resolveDynamicComponent, m as unref, a2 as Fragment } from "./vendor.32cd07bc.js";
import { l as useApi } from "./index.c92bb4bd.js";
import "./Auth.af141906.js";
import "./sidebarLayoutState.b3cee4ce.js";
const _sfc_main = /* @__PURE__ */ defineComponent({
  props: {
    service: {
      type: String,
      default: ""
    },
    endpoint: {
      type: String,
      default: ""
    }
  },
  setup(__props) {
    const props = __props;
    useRoute();
    const page = reactive({
      data: {
        props: {
          children: []
        }
      },
      render: 1
    });
    const { get } = useApi();
    onMounted(() => {
      getPage();
    });
    const getPage = async () => {
      const endpoint = props.endpoint.replaceAll("_", "/");
      get(`http://localhost/${props.service}/api/page/${endpoint}`).then((response) => {
        page.data = response.data;
        page.render++;
      });
    };
    watch(props, (newVal, oldVal) => {
      getPage();
    }, {
      immediate: false,
      deep: true
    });
    return (_ctx, _cache) => {
      const _component_gRoute = resolveComponent("gRoute");
      const _component_AppLayout = _sfc_main$1;
      return openBlock(), createBlock(_component_AppLayout, { openOnMounted: false }, {
        default: withCtx(() => [
          createVNode(_component_gRoute),
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(page).data.props.children, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              key: unref(page).render,
              properties: item.props
            }, null, 8, ["properties"]);
          }), 128))
        ]),
        _: 1
      });
    };
  }
});
export { _sfc_main as default };
