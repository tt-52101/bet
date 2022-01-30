import { u as useUserSession, i as isDark, t as toggleDarkModeHandler, a as __unplugin_components_0, b as __unplugin_components_0$1, c as _sfc_main$1, d as _sfc_main$2, e as useNotyf } from "./index.34cdef1e.js";
import { d as defineComponent, r as ref, a as useRouter, ac as useRoute, B as useHead, k as resolveComponent, o as openBlock, b as createElementBlock, e as createBaseVNode, q as createVNode, s as withCtx, m as unref, l as withModifiers, t as withDirectives, a9 as vModelText, y as createTextVNode } from "./vendor.5ec5354d.js";
import { A as Auth } from "./Auth.dc913cda.js";
const _hoisted_1 = { class: "auth-wrapper-inner is-single" };
const _hoisted_2 = { class: "auth-nav" };
const _hoisted_3 = /* @__PURE__ */ createBaseVNode("div", { class: "left" }, null, -1);
const _hoisted_4 = { class: "center" };
const _hoisted_5 = { class: "right" };
const _hoisted_6 = { class: "dark-mode ml-auto" };
const _hoisted_7 = ["checked"];
const _hoisted_8 = /* @__PURE__ */ createBaseVNode("span", null, null, -1);
const _hoisted_9 = { class: "single-form-wrap" };
const _hoisted_10 = { class: "inner-wrap" };
const _hoisted_11 = /* @__PURE__ */ createBaseVNode("div", { class: "auth-head" }, [
  /* @__PURE__ */ createBaseVNode("h2", null, "Welcome"),
  /* @__PURE__ */ createBaseVNode("p", null, "Please sign in to your account")
], -1);
const _hoisted_12 = { class: "form-card" };
const _hoisted_13 = ["onSubmit"];
const _hoisted_14 = { class: "login-form" };
const _hoisted_15 = /* @__PURE__ */ createBaseVNode("label", {
  for: "remember-me",
  class: "form-switch is-primary"
}, [
  /* @__PURE__ */ createBaseVNode("input", {
    id: "remember-me",
    type: "checkbox",
    class: "is-switch"
  }),
  /* @__PURE__ */ createBaseVNode("i", { "aria-hidden": "true" })
], -1);
const _hoisted_16 = /* @__PURE__ */ createBaseVNode("div", { class: "setting-meta" }, [
  /* @__PURE__ */ createBaseVNode("label", { for: "remember-me" }, [
    /* @__PURE__ */ createBaseVNode("span", null, "Remember Me")
  ])
], -1);
const _hoisted_17 = /* @__PURE__ */ createTextVNode(" Sign In ");
const _hoisted_18 = /* @__PURE__ */ createBaseVNode("div", { class: "forgot-link has-text-centered" }, [
  /* @__PURE__ */ createBaseVNode("a", null, "Forgot Password?")
], -1);
const _sfc_main = /* @__PURE__ */ defineComponent({
  setup(__props) {
    const isLoading = ref(false);
    const router = useRouter();
    const route = useRoute();
    const notif = useNotyf();
    const userSession = useUserSession();
    const redirect = route.query.redirect;
    const auth = new Auth();
    const properties = ref({
      username: "",
      password: ""
    });
    const handleLogin = async () => {
      if (!isLoading.value) {
        isLoading.value = true;
        auth.login(properties.value.username, properties.value.password).then((response) => {
          userSession.setToken(response.data.access_token, response.data.refresh_token);
          notif.dismissAll();
          notif.success("Welcome back");
          if (redirect) {
            router.push(redirect);
          } else {
            router.push({
              path: "/pages/auth/profile"
            });
          }
        }).catch((err) => {
          notif.error(err.response.data.message);
        });
        isLoading.value = false;
      }
    };
    useHead({
      title: "Auth Login 3 - Vuero"
    });
    return (_ctx, _cache) => {
      const _component_AnimatedLogo = __unplugin_components_0;
      const _component_RouterLink = resolveComponent("RouterLink");
      const _component_VControl = __unplugin_components_0$1;
      const _component_VField = _sfc_main$1;
      const _component_VButton = _sfc_main$2;
      return openBlock(), createElementBlock("div", _hoisted_1, [
        createBaseVNode("div", _hoisted_2, [
          _hoisted_3,
          createBaseVNode("div", _hoisted_4, [
            createVNode(_component_RouterLink, {
              to: { name: "index" },
              class: "header-item"
            }, {
              default: withCtx(() => [
                createVNode(_component_AnimatedLogo, {
                  width: "38px",
                  height: "38px"
                })
              ]),
              _: 1
            })
          ]),
          createBaseVNode("div", _hoisted_5, [
            createBaseVNode("label", _hoisted_6, [
              createBaseVNode("input", {
                type: "checkbox",
                checked: !unref(isDark),
                onChange: _cache[0] || (_cache[0] = (...args) => unref(toggleDarkModeHandler) && unref(toggleDarkModeHandler)(...args))
              }, null, 40, _hoisted_7),
              _hoisted_8
            ])
          ])
        ]),
        createBaseVNode("div", _hoisted_9, [
          createBaseVNode("div", _hoisted_10, [
            _hoisted_11,
            createBaseVNode("div", _hoisted_12, [
              createBaseVNode("form", {
                onSubmit: withModifiers(handleLogin, ["prevent"])
              }, [
                createBaseVNode("div", _hoisted_14, [
                  createVNode(_component_VField, null, {
                    default: withCtx(() => [
                      createVNode(_component_VControl, { icon: "feather:user" }, {
                        default: withCtx(() => [
                          withDirectives(createBaseVNode("input", {
                            class: "input",
                            type: "text",
                            placeholder: "Username",
                            autocomplete: "username",
                            "onUpdate:modelValue": _cache[1] || (_cache[1] = ($event) => properties.value.username = $event)
                          }, null, 512), [
                            [vModelText, properties.value.username]
                          ])
                        ]),
                        _: 1
                      })
                    ]),
                    _: 1
                  }),
                  createVNode(_component_VField, null, {
                    default: withCtx(() => [
                      createVNode(_component_VControl, { icon: "feather:lock" }, {
                        default: withCtx(() => [
                          withDirectives(createBaseVNode("input", {
                            class: "input",
                            type: "password",
                            placeholder: "Password",
                            autocomplete: "current-password",
                            "onUpdate:modelValue": _cache[2] || (_cache[2] = ($event) => properties.value.password = $event)
                          }, null, 512), [
                            [vModelText, properties.value.password]
                          ])
                        ]),
                        _: 1
                      })
                    ]),
                    _: 1
                  }),
                  createVNode(_component_VControl, { class: "setting-item" }, {
                    default: withCtx(() => [
                      _hoisted_15,
                      _hoisted_16
                    ]),
                    _: 1
                  }),
                  createVNode(_component_VControl, { class: "login" }, {
                    default: withCtx(() => [
                      createVNode(_component_VButton, {
                        loading: isLoading.value,
                        type: "submit",
                        color: "primary",
                        bold: "",
                        fullwidth: "",
                        raised: ""
                      }, {
                        default: withCtx(() => [
                          _hoisted_17
                        ]),
                        _: 1
                      }, 8, ["loading"])
                    ]),
                    _: 1
                  })
                ])
              ], 40, _hoisted_13)
            ]),
            _hoisted_18
          ])
        ])
      ]);
    };
  }
});
export { _sfc_main as default };
