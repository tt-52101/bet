import { _ as _export_sfc, j as __unplugin_components_0, b as __unplugin_components_0$1 } from "./index.c92bb4bd.js";
import { o as openBlock, C as createBlock, s as withCtx, e as createBaseVNode, d as defineComponent, b as createElementBlock, A as renderSlot, n as normalizeClass, r as ref, k as resolveComponent, q as createVNode, af as mergeProps, ag as toHandlers, z as createStaticVNode, B as useHead } from "./vendor.32cd07bc.js";
import { p as pageTitle } from "./sidebarLayoutState.b3cee4ce.js";
const _sfc_main$3 = {};
const _hoisted_1$2 = /* @__PURE__ */ createBaseVNode("a", {
  role: "menuitem",
  href: "#",
  class: "dropdown-item is-media"
}, [
  /* @__PURE__ */ createBaseVNode("div", { class: "icon" }, [
    /* @__PURE__ */ createBaseVNode("i", {
      "aria-hidden": "true",
      class: "lnil lnil-reload"
    })
  ]),
  /* @__PURE__ */ createBaseVNode("div", { class: "meta" }, [
    /* @__PURE__ */ createBaseVNode("span", null, "Reload"),
    /* @__PURE__ */ createBaseVNode("span", null, "Refresh search results")
  ])
], -1);
const _hoisted_2$1 = /* @__PURE__ */ createBaseVNode("a", {
  role: "menuitem",
  href: "#",
  class: "dropdown-item is-media"
}, [
  /* @__PURE__ */ createBaseVNode("div", { class: "icon" }, [
    /* @__PURE__ */ createBaseVNode("i", {
      "aria-hidden": "true",
      class: "lnil lnil-save"
    })
  ]),
  /* @__PURE__ */ createBaseVNode("div", { class: "meta" }, [
    /* @__PURE__ */ createBaseVNode("span", null, "Save"),
    /* @__PURE__ */ createBaseVNode("span", null, "Save this search")
  ])
], -1);
const _hoisted_3$1 = /* @__PURE__ */ createBaseVNode("hr", { class: "dropdown-divider" }, null, -1);
const _hoisted_4$1 = /* @__PURE__ */ createBaseVNode("a", {
  role: "menuitem",
  href: "#",
  class: "dropdown-item is-media"
}, [
  /* @__PURE__ */ createBaseVNode("div", { class: "icon" }, [
    /* @__PURE__ */ createBaseVNode("i", {
      "aria-hidden": "true",
      class: "lnil lnil-cog"
    })
  ]),
  /* @__PURE__ */ createBaseVNode("div", { class: "meta" }, [
    /* @__PURE__ */ createBaseVNode("span", null, "Settings"),
    /* @__PURE__ */ createBaseVNode("span", null, "configuration options")
  ])
], -1);
function _sfc_render(_ctx, _cache) {
  const _component_VDropdown = __unplugin_components_0;
  return openBlock(), createBlock(_component_VDropdown, {
    icon: "feather:more-vertical",
    spaced: "",
    right: ""
  }, {
    content: withCtx(() => [
      _hoisted_1$2,
      _hoisted_2$1,
      _hoisted_3$1,
      _hoisted_4$1
    ]),
    _: 1
  });
}
var __unplugin_components_1 = /* @__PURE__ */ _export_sfc(_sfc_main$3, [["render", _sfc_render]]);
const _sfc_main$2 = /* @__PURE__ */ defineComponent({
  props: {
    straight: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["widget", [props.straight && "is-straight"]])
      }, [
        renderSlot(_ctx.$slots, "header"),
        renderSlot(_ctx.$slots, "body")
      ], 2);
    };
  }
});
var _imports_0 = "/auth/dash/assets/travel.96d1475d.svg";
var _imports_1 = "/auth/dash/assets/travel-dark.68836002.svg";
var _imports_2 = "/auth/dash/assets/company1.0bfbc22c.svg";
var _imports_3 = "/auth/dash/assets/company2.ec0938c8.svg";
var _imports_4 = "/auth/dash/assets/company3.8bd044da.svg";
var FlightsDashboard_vue_vue_type_style_index_0_lang = "";
const _hoisted_1$1 = { class: "business-dashboard flights-dashboard" };
const _hoisted_2 = { class: "columns" };
const _hoisted_3 = { class: "column is-9" };
const _hoisted_4 = { class: "booking-bar-wrapper" };
const _hoisted_5 = /* @__PURE__ */ createStaticVNode('<img class="travel-illustration light-image" src="' + _imports_0 + '" alt=""><img class="travel-illustration dark-image" src="' + _imports_1 + '" alt=""><div class="booking-bar-info"><i aria-hidden="true" class="lnil lnil-plane-alt"></i><div class="inner"><h2 class="booking-bar-heading"> Paris <small>[PAR]</small> - New York <small>[NY]</small></h2><p class="booking-bar-sub-heading">1 adult - Business</p></div></div>', 3);
const _hoisted_8 = { class: "booking-bar" };
const _hoisted_9 = { class: "booking-bar-inputs" };
const _hoisted_10 = ["value"];
const _hoisted_11 = ["value"];
const _hoisted_12 = { class: "flights-toolbar" };
const _hoisted_13 = /* @__PURE__ */ createBaseVNode("h3", { class: "dark-inverted" }, "74 results", -1);
const _hoisted_14 = /* @__PURE__ */ createStaticVNode('<div class="flights-summary-wrapper"><div class="columns is-flex-tablet-p"><div class="column is-4"><a class="flight-summary"><div class="flight-price">312</div><div class="meta"><span>Cheapest</span><span>7h32min</span></div></a></div><div class="column is-4"><a class="flight-summary is-featured"><div class="flight-price">428</div><div class="meta"><span>Best</span><span>7h16min</span></div></a></div><div class="column is-4"><a class="flight-summary"><div class="flight-price">549</div><div class="meta"><span>Fastest</span><span>5h36min</span></div></a></div></div></div><div class="flights"><a class="flight-card"><img src="' + _imports_2 + '" alt=""><div class="start"><span>11:30 am</span><span>Paris ORLY</span><span>Monday, Jul 7th</span></div><div class="route"><div class="departure"></div><div class="line" data-content="1 stop"></div><div class="arrival"><i aria-hidden="true" class="lnil lnil-plane-alt"></i></div></div><div class="end"><span>06:59 pm</span><span>New York JFK</span><span>Monday, Jul 7th</span></div><div class="flight-price">374</div></a><a class="flight-card"><img src="' + _imports_3 + '" alt=""><div class="start"><span>09:30 am</span><span>Paris ORLY</span><span>Monday, Jul 7th</span></div><div class="route"><div class="departure"></div><div class="line" data-content="1 stop"></div><div class="arrival"><i aria-hidden="true" class="lnil lnil-plane-alt"></i></div></div><div class="end"><span>04:18 pm</span><span>New York JFK</span><span>Monday, Jul 7th</span></div><div class="flight-price">392</div></a><a class="flight-card"><img src="' + _imports_2 + '" alt=""><div class="start"><span>06:42 am</span><span>Paris ORLY</span><span>Monday, Jul 7th</span></div><div class="route"><div class="departure"></div><div class="line" data-content="direct"></div><div class="arrival"><i aria-hidden="true" class="lnil lnil-plane-alt"></i></div></div><div class="end"><span>02:11 pm</span><span>New York JFK</span><span>Monday, Jul 7th</span></div><div class="flight-price">398</div></a><a class="flight-card"><img src="' + _imports_4 + '" alt=""><div class="start"><span>07:23 am</span><span>Paris ORLY</span><span>Monday, Jul 7th</span></div><div class="route"><div class="departure"></div><div class="line" data-content="direct"></div><div class="arrival"><i aria-hidden="true" class="lnil lnil-plane-alt"></i></div></div><div class="end"><span>01:46 pm</span><span>New York JFK</span><span>Monday, Jul 7th</span></div><div class="flight-price">407</div></a><a class="flight-card"><img src="' + _imports_2 + '" alt=""><div class="start"><span>10:12 am</span><span>Paris ORLY</span><span>Monday, Jul 7th</span></div><div class="route"><div class="departure"></div><div class="line" data-content="1 stop"></div><div class="arrival"><i aria-hidden="true" class="lnil lnil-plane-alt"></i></div></div><div class="end"><span>03:39 pm</span><span>New York JFK</span><span>Monday, Jul 7th</span></div><div class="flight-price">431</div></a></div>', 2);
const _hoisted_16 = { class: "column is-3" };
const _hoisted_17 = /* @__PURE__ */ createBaseVNode("div", { class: "field" }, [
  /* @__PURE__ */ createBaseVNode("div", { class: "control" }, [
    /* @__PURE__ */ createBaseVNode("input", {
      type: "text",
      class: "input",
      placeholder: "Search..."
    }),
    /* @__PURE__ */ createBaseVNode("button", { class: "searcv-button" }, [
      /* @__PURE__ */ createBaseVNode("i", {
        "aria-hidden": "true",
        class: "iconify",
        "data-icon": "feather:search"
      })
    ])
  ]),
  /* @__PURE__ */ createBaseVNode("div", { class: "topics" }, [
    /* @__PURE__ */ createBaseVNode("a", null, "#Paris"),
    /* @__PURE__ */ createBaseVNode("a", null, "#Berlin"),
    /* @__PURE__ */ createBaseVNode("a", null, "#Chicago")
  ])
], -1);
const _hoisted_18 = /* @__PURE__ */ createBaseVNode("div", { class: "widget-toolbar" }, [
  /* @__PURE__ */ createBaseVNode("div", { class: "left" }, [
    /* @__PURE__ */ createBaseVNode("a", { class: "action-icon" }, [
      /* @__PURE__ */ createBaseVNode("i", {
        "aria-hidden": "true",
        class: "iconify",
        "data-icon": "feather:chevron-left"
      })
    ])
  ]),
  /* @__PURE__ */ createBaseVNode("div", { class: "center" }, [
    /* @__PURE__ */ createBaseVNode("h3", null, "October 2020")
  ]),
  /* @__PURE__ */ createBaseVNode("div", { class: "right" }, [
    /* @__PURE__ */ createBaseVNode("a", { class: "action-icon" }, [
      /* @__PURE__ */ createBaseVNode("i", {
        "aria-hidden": "true",
        class: "iconify",
        "data-icon": "feather:chevron-right"
      })
    ])
  ])
], -1);
const _hoisted_19 = /* @__PURE__ */ createBaseVNode("table", { class: "calendar" }, [
  /* @__PURE__ */ createBaseVNode("thead", null, [
    /* @__PURE__ */ createBaseVNode("tr", null, [
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Mon"),
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Tue"),
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Wed"),
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Thu"),
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Fri"),
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Sat"),
      /* @__PURE__ */ createBaseVNode("th", { scope: "col" }, "Sun")
    ])
  ]),
  /* @__PURE__ */ createBaseVNode("tbody", null, [
    /* @__PURE__ */ createBaseVNode("tr", null, [
      /* @__PURE__ */ createBaseVNode("td", { class: "prev-month" }, "29"),
      /* @__PURE__ */ createBaseVNode("td", { class: "prev-month" }, "30"),
      /* @__PURE__ */ createBaseVNode("td", { class: "prev-month" }, "31"),
      /* @__PURE__ */ createBaseVNode("td", null, "1"),
      /* @__PURE__ */ createBaseVNode("td", null, "2"),
      /* @__PURE__ */ createBaseVNode("td", null, "3"),
      /* @__PURE__ */ createBaseVNode("td", null, "4")
    ]),
    /* @__PURE__ */ createBaseVNode("tr", null, [
      /* @__PURE__ */ createBaseVNode("td", null, "5"),
      /* @__PURE__ */ createBaseVNode("td", null, "6"),
      /* @__PURE__ */ createBaseVNode("td", null, "7"),
      /* @__PURE__ */ createBaseVNode("td", null, "8"),
      /* @__PURE__ */ createBaseVNode("td", null, "9"),
      /* @__PURE__ */ createBaseVNode("td", null, "10"),
      /* @__PURE__ */ createBaseVNode("td", null, "11")
    ]),
    /* @__PURE__ */ createBaseVNode("tr", null, [
      /* @__PURE__ */ createBaseVNode("td", null, "12"),
      /* @__PURE__ */ createBaseVNode("td", null, "13"),
      /* @__PURE__ */ createBaseVNode("td", null, "14"),
      /* @__PURE__ */ createBaseVNode("td", null, "15"),
      /* @__PURE__ */ createBaseVNode("td", null, "16"),
      /* @__PURE__ */ createBaseVNode("td", null, "17"),
      /* @__PURE__ */ createBaseVNode("td", { class: "current-day" }, "18")
    ]),
    /* @__PURE__ */ createBaseVNode("tr", null, [
      /* @__PURE__ */ createBaseVNode("td", null, "19"),
      /* @__PURE__ */ createBaseVNode("td", null, "20"),
      /* @__PURE__ */ createBaseVNode("td", null, "21"),
      /* @__PURE__ */ createBaseVNode("td", null, "22"),
      /* @__PURE__ */ createBaseVNode("td", null, "23"),
      /* @__PURE__ */ createBaseVNode("td", null, "24"),
      /* @__PURE__ */ createBaseVNode("td", null, "25")
    ]),
    /* @__PURE__ */ createBaseVNode("tr", null, [
      /* @__PURE__ */ createBaseVNode("td", null, "26"),
      /* @__PURE__ */ createBaseVNode("td", null, "27"),
      /* @__PURE__ */ createBaseVNode("td", null, "28"),
      /* @__PURE__ */ createBaseVNode("td", null, "29"),
      /* @__PURE__ */ createBaseVNode("td", null, "30"),
      /* @__PURE__ */ createBaseVNode("td", null, "31"),
      /* @__PURE__ */ createBaseVNode("td", { class: "next-month" }, "1")
    ])
  ])
], -1);
const _hoisted_20 = /* @__PURE__ */ createStaticVNode('<div class="filters-card"><a class="button v-button is-primary is-fullwidth is-bold is-raised"> Add To Favorites </a><div class="checkboxes-list"><div class="field"><h5 class="dark-inverted">Stops</h5><div class="control"><label class="checkbox"><input type="radio" name="flight_stops" checked><span></span> All Flights </label></div><div class="control"><label class="checkbox"><input type="radio" name="flight_stops"><span></span> No Stops </label></div><div class="control"><label class="checkbox"><input type="radio" name="flight_stops"><span></span> 1 Stop </label></div><div class="control"><label class="checkbox"><input type="radio" name="flight_stops"><span></span> 2 Stops </label></div></div></div><div class="checkboxes-list"><div class="field"><h5 class="dark-inverted">Luggage</h5><div class="control"><label class="checkbox"><input type="radio" name="flight_luggage" checked><span></span> All Options </label></div><div class="control"><label class="checkbox"><input type="radio" name="flight_luggage"><span></span> 1 Cabin luggage </label></div><div class="control"><label class="checkbox"><input type="radio" name="flight_luggage"><span></span> 2 Cabin luggage </label></div><div class="control"><label class="checkbox"><input type="radio" name="flight_luggage"><span></span> None </label></div></div></div></div>', 1);
const _sfc_main$1 = /* @__PURE__ */ defineComponent({
  setup(__props) {
    const date = ref({
      start: new Date(),
      end: new Date()
    });
    return (_ctx, _cache) => {
      const _component_VControl = __unplugin_components_0$1;
      const _component_v_date_picker = resolveComponent("v-date-picker");
      const _component_FlightResultsDropdown = __unplugin_components_1;
      const _component_UIWidget = _sfc_main$2;
      return openBlock(), createElementBlock("div", _hoisted_1$1, [
        createBaseVNode("div", _hoisted_2, [
          createBaseVNode("div", _hoisted_3, [
            createBaseVNode("div", _hoisted_4, [
              _hoisted_5,
              createBaseVNode("div", _hoisted_8, [
                createVNode(_component_v_date_picker, {
                  modelValue: date.value,
                  "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => date.value = $event),
                  "is-range": "",
                  color: "green",
                  "trim-weeks": ""
                }, {
                  default: withCtx(({ inputValue, inputEvents }) => [
                    createBaseVNode("div", _hoisted_9, [
                      createVNode(_component_VControl, { icon: "feather:calendar" }, {
                        default: withCtx(() => [
                          createBaseVNode("input", mergeProps({
                            type: "text",
                            class: "input flight-datepicker",
                            placeholder: "Departure",
                            value: inputValue.start
                          }, toHandlers(inputEvents.start)), null, 16, _hoisted_10)
                        ]),
                        _: 2
                      }, 1024),
                      createVNode(_component_VControl, { icon: "feather:calendar" }, {
                        default: withCtx(() => [
                          createBaseVNode("input", mergeProps({
                            type: "text",
                            class: "input flight-datepicker",
                            placeholder: "Return",
                            value: inputValue.end
                          }, toHandlers(inputEvents.end)), null, 16, _hoisted_11)
                        ]),
                        _: 2
                      }, 1024)
                    ])
                  ]),
                  _: 1
                }, 8, ["modelValue"])
              ])
            ]),
            createBaseVNode("div", _hoisted_12, [
              _hoisted_13,
              createVNode(_component_FlightResultsDropdown)
            ]),
            _hoisted_14
          ]),
          createBaseVNode("div", _hoisted_16, [
            createVNode(_component_UIWidget, {
              class: "search-widget",
              straight: ""
            }, {
              body: withCtx(() => [
                _hoisted_17
              ]),
              _: 1
            }),
            createVNode(_component_UIWidget, { class: "picker-widget" }, {
              header: withCtx(() => [
                _hoisted_18
              ]),
              body: withCtx(() => [
                _hoisted_19
              ]),
              _: 1
            }),
            _hoisted_20
          ])
        ])
      ]);
    };
  }
});
const _hoisted_1 = { class: "page-content-inner" };
const _sfc_main = /* @__PURE__ */ defineComponent({
  setup(__props) {
    pageTitle.value = "Main Dashboard";
    useHead({
      title: "Main Dashboard - My app"
    });
    return (_ctx, _cache) => {
      const _component_FlightsDashboard = _sfc_main$1;
      return openBlock(), createElementBlock("div", _hoisted_1, [
        createVNode(_component_FlightsDashboard)
      ]);
    };
  }
});
export { _sfc_main as default };
