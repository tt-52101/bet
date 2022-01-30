import { _ as _sfc_main$1 } from "./AppLayout.3214db8e.js";
import { d as defineComponent, ac as useRoute, k as resolveComponent, o as openBlock, C as createBlock, s as withCtx, q as createVNode, T as Transition, Z as resolveDynamicComponent, m as unref } from "./vendor.32cd07bc.js";
import "./index.4023ea6a.js";
import "./Auth.801fc8fa.js";
import "./sidebarLayoutState.b3cee4ce.js";
var block0 = {};
const _sfc_main = /* @__PURE__ */ defineComponent({
  setup(__props) {
    const route = useRoute();
    return (_ctx, _cache) => {
      const _component_RouterView = resolveComponent("RouterView");
      const _component_AppLayout = _sfc_main$1;
      return openBlock(), createBlock(_component_AppLayout, null, {
        default: withCtx(() => [
          createVNode(_component_RouterView, null, {
            default: withCtx(({ Component }) => [
              createVNode(Transition, {
                name: "fade-fast",
                mode: "out-in"
              }, {
                default: withCtx(() => [
                  (openBlock(), createBlock(resolveDynamicComponent(Component), {
                    key: unref(route).fullPath
                  }))
                ]),
                _: 2
              }, 1024)
            ]),
            _: 1
          })
        ]),
        _: 1
      });
    };
  }
});
if (typeof block0 === "function")
  block0(_sfc_main);
export { _sfc_main as default };
