import { _ as _sfc_main$1 } from "./AppLayout.5fae32f8.js";
import { d as defineComponent, ac as useRoute, k as resolveComponent, o as openBlock, C as createBlock, s as withCtx, q as createVNode, T as Transition, Z as resolveDynamicComponent, m as unref } from "./vendor.5ec5354d.js";
import "./index.34cdef1e.js";
import "./Auth.dc913cda.js";
import "./sidebarLayoutState.e7e014d2.js";
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
