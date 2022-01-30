var __defProp = Object.defineProperty;
var __defProps = Object.defineProperties;
var __getOwnPropDescs = Object.getOwnPropertyDescriptors;
var __getOwnPropSymbols = Object.getOwnPropertySymbols;
var __hasOwnProp = Object.prototype.hasOwnProperty;
var __propIsEnum = Object.prototype.propertyIsEnumerable;
var __defNormalProp = (obj, key, value) => key in obj ? __defProp(obj, key, { enumerable: true, configurable: true, writable: true, value }) : obj[key] = value;
var __spreadValues = (a, b) => {
  for (var prop in b || (b = {}))
    if (__hasOwnProp.call(b, prop))
      __defNormalProp(a, prop, b[prop]);
  if (__getOwnPropSymbols)
    for (var prop of __getOwnPropSymbols(b)) {
      if (__propIsEnum.call(b, prop))
        __defNormalProp(a, prop, b[prop]);
    }
  return a;
};
var __spreadProps = (a, b) => __defProps(a, __getOwnPropDescs(b));
var __publicField = (obj, key, value) => {
  __defNormalProp(obj, typeof key !== "symbol" ? key + "" : key, value);
  return value;
};
import { M as Module, u as useStorage, c as createI18n$1, d as defineComponent, a as useRouter, r as ref, o as openBlock, b as createElementBlock, e as createBaseVNode, n as normalizeClass, p as pushScopeId, f as popScopeId, g as useMediaQuery, h as usePreferredDark, i as computed, w as watchEffect, V as VueScrollTo, j as useWindowScroll, k as resolveComponent, l as withModifiers, m as unref, q as createVNode, s as withCtx, t as withDirectives, v as vModelCheckbox, x as isRef, y as createTextVNode, z as createStaticVNode, A as renderSlot, B as useHead, C as createBlock, D as createRouter$1, E as createWebHistory, F as nprogress$1, G as defineStore, H as axios, I as provide, N as Notyf, J as useCssVars, K as h, R as RouterLink, L as v, O as n, P as useI18n, T as Transition, Q as toDisplayString, S as createCommentVNode, U as createHead, W as createPinia, X as createApp$1, Y as RouterView, Z as resolveDynamicComponent, _, $ as reactive, a0 as onMounted, a1 as renderList, a2 as Fragment, a3 as createSlots, a4 as createStore, a5 as watch, a6 as onClickOutside, a7 as normalizeProps, a8 as guardReactiveProps, a9 as vModelText, aa as withKeys, ab as onUnmounted, ac as useRoute, ad as Teleport, ae as TransitionGroup, af as mergeProps, ag as toHandlers, ah as bb, ai as nextTick, aj as gauge } from "./vendor.32cd07bc.js";
const p = function polyfill() {
  const relList = document.createElement("link").relList;
  if (relList && relList.supports && relList.supports("modulepreload")) {
    return;
  }
  for (const link of document.querySelectorAll('link[rel="modulepreload"]')) {
    processPreload(link);
  }
  new MutationObserver((mutations) => {
    for (const mutation of mutations) {
      if (mutation.type !== "childList") {
        continue;
      }
      for (const node of mutation.addedNodes) {
        if (node.tagName === "LINK" && node.rel === "modulepreload")
          processPreload(node);
      }
    }
  }).observe(document, { childList: true, subtree: true });
  function getFetchOpts(script) {
    const fetchOpts = {};
    if (script.integrity)
      fetchOpts.integrity = script.integrity;
    if (script.referrerpolicy)
      fetchOpts.referrerPolicy = script.referrerpolicy;
    if (script.crossorigin === "use-credentials")
      fetchOpts.credentials = "include";
    else if (script.crossorigin === "anonymous")
      fetchOpts.credentials = "omit";
    else
      fetchOpts.credentials = "same-origin";
    return fetchOpts;
  }
  function processPreload(link) {
    if (link.ep)
      return;
    link.ep = true;
    const fetchOpts = getFetchOpts(link);
    fetch(link.href, fetchOpts);
  }
};
p();
const Iconify = Module.default || Module;
const collections = JSON.parse('[{"prefix":"ri","width":24,"height":24,"icons":{}},{"prefix":"ion","width":512,"height":512,"icons":{"reload-outline":{"body":"<path d=\\"M400 148l-21.12-24.57A191.43 191.43 0 0 0 240 64C134 64 48 150 48 256s86 192 192 192a192.09 192.09 0 0 0 181.07-128\\" fill=\\"none\\" stroke=\\"currentColor\\" stroke-linecap=\\"round\\" stroke-miterlimit=\\"10\\" stroke-width=\\"32\\"/><path d=\\"M464 97.42V208a16 16 0 0 1-16 16H337.42c-14.26 0-21.4-17.23-11.32-27.31L436.69 86.1C446.77 76 464 83.16 464 97.42z\\" fill=\\"currentColor\\"/>"}}},{"prefix":"feather","width":24,"height":24,"icons":{"activity":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M22 12h-4l-3 9L9 3l-3 9H2\\"/></g>"},"bell":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9\\"/><path d=\\"M13.73 21a2 2 0 0 1-3.46 0\\"/></g>"},"calendar":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><rect x=\\"3\\" y=\\"4\\" width=\\"18\\" height=\\"18\\" rx=\\"2\\" ry=\\"2\\"/><path d=\\"M16 2v4\\"/><path d=\\"M8 2v4\\"/><path d=\\"M3 10h18\\"/></g>"},"check":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M20 6L9 17l-5-5\\"/></g>"},"chevron-down":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M6 9l6 6l6-6\\"/></g>"},"chevron-left":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M15 18l-6-6l6-6\\"/></g>"},"chevron-right":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M9 18l6-6l-6-6\\"/></g>"},"github":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77A5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22\\"/></g>"},"home":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M3 9l9-7l9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z\\"/><path d=\\"M9 22V12h6v10\\"/></g>"},"link":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71\\"/><path d=\\"M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71\\"/></g>"},"lock":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><rect x=\\"3\\" y=\\"11\\" width=\\"18\\" height=\\"11\\" rx=\\"2\\" ry=\\"2\\"/><path d=\\"M7 11V7a5 5 0 0 1 10 0v4\\"/></g>"},"log-out":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4\\"/><path d=\\"M16 17l5-5l-5-5\\"/><path d=\\"M21 12H9\\"/></g>"},"mail":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z\\"/><path d=\\"M22 6l-10 7L2 6\\"/></g>"},"moon":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M21 12.79A9 9 0 1 1 11.21 3A7 7 0 0 0 21 12.79z\\"/></g>"},"more-vertical":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><circle cx=\\"12\\" cy=\\"12\\" r=\\"1\\"/><circle cx=\\"12\\" cy=\\"5\\" r=\\"1\\"/><circle cx=\\"12\\" cy=\\"19\\" r=\\"1\\"/></g>"},"plus":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M12 5v14\\"/><path d=\\"M5 12h14\\"/></g>"},"search":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><circle cx=\\"11\\" cy=\\"11\\" r=\\"8\\"/><path d=\\"M21 21l-4.35-4.35\\"/></g>"},"settings":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><circle cx=\\"12\\" cy=\\"12\\" r=\\"3\\"/><path d=\\"M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83a2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33a1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2a2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0a2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2a2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83a2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2a2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0a2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2a2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z\\"/></g>"},"sun":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><circle cx=\\"12\\" cy=\\"12\\" r=\\"5\\"/><path d=\\"M12 1v2\\"/><path d=\\"M12 21v2\\"/><path d=\\"M4.22 4.22l1.42 1.42\\"/><path d=\\"M18.36 18.36l1.42 1.42\\"/><path d=\\"M1 12h2\\"/><path d=\\"M21 12h2\\"/><path d=\\"M4.22 19.78l1.42-1.42\\"/><path d=\\"M18.36 5.64l1.42-1.42\\"/></g>"},"user":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\\"/><circle cx=\\"12\\" cy=\\"7\\" r=\\"4\\"/></g>"},"x":{"body":"<g fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M18 6L6 18\\"/><path d=\\"M6 6l12 12\\"/></g>"}}},{"prefix":"fa","width":1536,"height":1536,"icons":{"angle-down":{"body":"<path d=\\"M1011 480q0 13-10 23L535 969q-10 10-23 10t-23-10L23 503q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393l393-393q10-10 23-10t23 10l50 50q10 10 10 23z\\" fill=\\"currentColor\\"/>","width":1024,"height":1280,"inlineTop":-256},"angle-up":{"body":"<path d=\\"M1011 928q0 13-10 23l-50 50q-10 10-23 10t-23-10L512 608l-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z\\" fill=\\"currentColor\\"/>","width":1024,"height":1280,"inlineTop":-256}}},{"prefix":"fa-brands","width":448,"height":512,"icons":{"amazon":{"body":"<path d=\\"M257.2 162.7c-48.7 1.8-169.5 15.5-169.5 117.5c0 109.5 138.3 114 183.5 43.2c6.5 10.2 35.4 37.5 45.3 46.8l56.8-56S341 288.9 341 261.4V114.3C341 89 316.5 32 228.7 32C140.7 32 94 87 94 136.3l73.5 6.8c16.3-49.5 54.2-49.5 54.2-49.5c40.7-.1 35.5 29.8 35.5 69.1zm0 86.8c0 80-84.2 68-84.2 17.2c0-47.2 50.5-56.7 84.2-57.8v40.6zm136 163.5c-7.7 10-70 67-174.5 67S34.2 408.5 9.7 379c-6.8-7.7 1-11.3 5.5-8.3C88.5 415.2 203 488.5 387.7 401c7.5-3.7 13.3 2 5.5 12zm39.8 2.2c-6.5 15.8-16 26.8-21.2 31c-5.5 4.5-9.5 2.7-6.5-3.8s19.3-46.5 12.7-55c-6.5-8.3-37-4.3-48-3.2c-10.8 1-13 2-14-.3c-2.3-5.7 21.7-15.5 37.5-17.5c15.7-1.8 41-.8 46 5.7c3.7 5.1 0 27.1-6.5 43.1z\\" fill=\\"currentColor\\"/>"},"dribbble":{"body":"<path d=\\"M256 8C119.252 8 8 119.252 8 256s111.252 248 248 248s248-111.252 248-248S392.748 8 256 8zm163.97 114.366c29.503 36.046 47.369 81.957 47.835 131.955c-6.984-1.477-77.018-15.682-147.502-6.818c-5.752-14.041-11.181-26.393-18.617-41.614c78.321-31.977 113.818-77.482 118.284-83.523zM396.421 97.87c-3.81 5.427-35.697 48.286-111.021 76.519c-34.712-63.776-73.185-116.168-79.04-124.008c67.176-16.193 137.966 1.27 190.061 47.489zm-230.48-33.25c5.585 7.659 43.438 60.116 78.537 122.509c-99.087 26.313-186.36 25.934-195.834 25.809C62.38 147.205 106.678 92.573 165.941 64.62zM44.17 256.323c0-2.166.043-4.322.108-6.473c9.268.19 111.92 1.513 217.706-30.146c6.064 11.868 11.857 23.915 17.174 35.949c-76.599 21.575-146.194 83.527-180.531 142.306C64.794 360.405 44.17 310.73 44.17 256.323zm81.807 167.113c22.127-45.233 82.178-103.622 167.579-132.756c29.74 77.283 42.039 142.053 45.189 160.638c-68.112 29.013-150.015 21.053-212.768-27.882zm248.38 8.489c-2.171-12.886-13.446-74.897-41.152-151.033c66.38-10.626 124.7 6.768 131.947 9.055c-9.442 58.941-43.273 109.844-90.795 141.978z\\" fill=\\"currentColor\\"/>","width":512},"facebook-f":{"body":"<path d=\\"M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z\\" fill=\\"currentColor\\"/>","width":320},"github-alt":{"body":"<path d=\\"M186.1 328.7c0 20.9-10.9 55.1-36.7 55.1s-36.7-34.2-36.7-55.1s10.9-55.1 36.7-55.1s36.7 34.2 36.7 55.1zM480 278.2c0 31.9-3.2 65.7-17.5 95c-37.9 76.6-142.1 74.8-216.7 74.8c-75.8 0-186.2 2.7-225.6-74.8c-14.6-29-20.2-63.1-20.2-95c0-41.9 13.9-81.5 41.5-113.6c-5.2-15.8-7.7-32.4-7.7-48.8c0-21.5 4.9-32.3 14.6-51.8c45.3 0 74.3 9 108.8 36c29-6.9 58.8-10 88.7-10c27 0 54.2 2.9 80.4 9.2c34-26.7 63-35.2 107.8-35.2c9.8 19.5 14.6 30.3 14.6 51.8c0 16.4-2.6 32.7-7.7 48.2c27.5 32.4 39 72.3 39 114.2zm-64.3 50.5c0-43.9-26.7-82.6-73.5-82.6c-18.9 0-37 3.4-56 6c-14.9 2.3-29.8 3.2-45.1 3.2c-15.2 0-30.1-.9-45.1-3.2c-18.7-2.6-37-6-56-6c-46.8 0-73.5 38.7-73.5 82.6c0 87.8 80.4 101.3 150.4 101.3h48.2c70.3 0 150.6-13.4 150.6-101.3zm-82.6-55.1c-25.8 0-36.7 34.2-36.7 55.1s10.9 55.1 36.7 55.1s36.7-34.2 36.7-55.1s-10.9-55.1-36.7-55.1z\\" fill=\\"currentColor\\"/>","width":480},"google-plus-g":{"body":"<path d=\\"M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599c-65.484 0-118.92 54.221-118.92 121.277c0 67.056 53.436 121.277 118.92 121.277c75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z\\" fill=\\"currentColor\\"/>","width":640},"instagram":{"body":"<path d=\\"M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9S287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7s74.7 33.5 74.7 74.7s-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8c-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8s26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9c-26.2-26.2-58-34.4-93.9-36.2c-37-2.1-147.9-2.1-184.9 0c-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9c1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0c35.9-1.7 67.7-9.9 93.9-36.2c26.2-26.2 34.4-58 36.2-93.9c2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z\\" fill=\\"currentColor\\"/>"},"invision":{"body":"<path d=\\"M407.4 32H40.6C18.2 32 0 50.2 0 72.6v366.8C0 461.8 18.2 480 40.6 480h366.8c22.4 0 40.6-18.2 40.6-40.6V72.6c0-22.4-18.2-40.6-40.6-40.6zM176.1 145.6c.4 23.4-22.4 27.3-26.6 27.4c-14.9 0-27.1-12-27.1-27c.1-35.2 53.1-35.5 53.7-.4zM332.8 377c-65.6 0-34.1-74-25-106.6c14.1-46.4-45.2-59-59.9.7l-25.8 103.3H177l8.1-32.5c-31.5 51.8-94.6 44.4-94.6-4.3c.1-14.3.9-14 23-104.1H81.7l9.7-35.6h76.4c-33.6 133.7-32.6 126.9-32.9 138.2c0 20.9 40.9 13.5 57.4-23.2l19.8-79.4h-32.3l9.7-35.6h68.8l-8.9 40.5c40.5-75.5 127.9-47.8 101.8 38c-14.2 51.1-14.6 50.7-14.9 58.8c0 15.5 17.5 22.6 31.8-16.9L386 325c-10.5 36.7-29.4 52-53.2 52z\\" fill=\\"currentColor\\"/>"},"linkedin-in":{"body":"<path d=\\"M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2c-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3c94 0 111.28 61.9 111.28 142.3V448z\\" fill=\\"currentColor\\"/>"},"reddit-alien":{"body":"<path d=\\"M440.3 203.5c-15 0-28.2 6.2-37.9 15.9c-35.7-24.7-83.8-40.6-137.1-42.3L293 52.3l88.2 19.8c0 21.6 17.6 39.2 39.2 39.2c22 0 39.7-18.1 39.7-39.7s-17.6-39.7-39.7-39.7c-15.4 0-28.7 9.3-35.3 22l-97.4-21.6c-4.9-1.3-9.7 2.2-11 7.1L246.3 177c-52.9 2.2-100.5 18.1-136.3 42.8c-9.7-10.1-23.4-16.3-38.4-16.3c-55.6 0-73.8 74.6-22.9 100.1c-1.8 7.9-2.6 16.3-2.6 24.7c0 83.8 94.4 151.7 210.3 151.7c116.4 0 210.8-67.9 210.8-151.7c0-8.4-.9-17.2-3.1-25.1c49.9-25.6 31.5-99.7-23.8-99.7zM129.4 308.9c0-22 17.6-39.7 39.7-39.7c21.6 0 39.2 17.6 39.2 39.7c0 21.6-17.6 39.2-39.2 39.2c-22 .1-39.7-17.6-39.7-39.2zm214.3 93.5c-36.4 36.4-139.1 36.4-175.5 0c-4-3.5-4-9.7 0-13.7c3.5-3.5 9.7-3.5 13.2 0c27.8 28.5 120 29 149 0c3.5-3.5 9.7-3.5 13.2 0c4.1 4 4.1 10.2.1 13.7zm-.8-54.2c-21.6 0-39.2-17.6-39.2-39.2c0-22 17.6-39.7 39.2-39.7c22 0 39.7 17.6 39.7 39.7c-.1 21.5-17.7 39.2-39.7 39.2z\\" fill=\\"currentColor\\"/>","width":512},"tumblr":{"body":"<path d=\\"M309.8 480.3c-13.6 14.5-50 31.7-97.4 31.7c-120.8 0-147-88.8-147-140.6v-144H17.9c-5.5 0-10-4.5-10-10v-68c0-7.2 4.5-13.6 11.3-16c62-21.8 81.5-76 84.3-117.1c.8-11 6.5-16.3 16.1-16.3h70.9c5.5 0 10 4.5 10 10v115.2h83c5.5 0 10 4.4 10 9.9v81.7c0 5.5-4.5 10-10 10h-83.4V360c0 34.2 23.7 53.6 68 35.8c4.8-1.9 9-3.2 12.7-2.2c3.5.9 5.8 3.4 7.4 7.9l22 64.3c1.8 5 3.3 10.6-.4 14.5z\\" fill=\\"currentColor\\"/>","width":320},"twitter":{"body":"<path d=\\"M459.37 151.716c.325 4.548.325 9.097.325 13.645c0 138.72-105.583 298.558-298.558 298.558c-59.452 0-114.68-17.219-161.137-47.106c8.447.974 16.568 1.299 25.34 1.299c49.055 0 94.213-16.568 130.274-44.832c-46.132-.975-84.792-31.188-98.112-72.772c6.498.974 12.995 1.624 19.818 1.624c9.421 0 18.843-1.3 27.614-3.573c-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319c-28.264-18.843-46.781-51.005-46.781-87.391c0-19.492 5.197-37.36 14.294-52.954c51.655 63.675 129.3 105.258 216.365 109.807c-1.624-7.797-2.599-15.918-2.599-24.04c0-57.828 46.782-104.934 104.934-104.934c30.213 0 57.502 12.67 76.67 33.137c23.715-4.548 46.456-13.32 66.599-25.34c-7.798 24.366-24.366 44.833-46.132 57.827c21.117-2.273 41.584-8.122 60.426-16.243c-14.292 20.791-32.161 39.308-52.628 54.253z\\" fill=\\"currentColor\\"/>","width":512},"youtube":{"body":"<path d=\\"M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597c-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821c11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205l-142.739 81.201z\\" fill=\\"currentColor\\"/>","width":576}}}]');
collections.forEach((c) => Iconify.addCollection(c));
var nprogress = "";
var _default$1 = "";
var _default = "";
var simplebar = "";
var tinySlider = "";
var notyf_min = "";
var tippy = "";
var svgArrow = "";
var border = "";
var backdrop = "";
var light = "";
var main = "";
const scriptRel = "modulepreload";
const seen = {};
const base = "/auth/dash/";
const __vitePreload = function preload(baseModule, deps) {
  if (!deps || deps.length === 0) {
    return baseModule();
  }
  return Promise.all(deps.map((dep) => {
    dep = `${base}${dep}`;
    if (dep in seen)
      return;
    seen[dep] = true;
    const isCss = dep.endsWith(".css");
    const cssSelector = isCss ? '[rel="stylesheet"]' : "";
    if (document.querySelector(`link[href="${dep}"]${cssSelector}`)) {
      return;
    }
    const link = document.createElement("link");
    link.rel = isCss ? "stylesheet" : scriptRel;
    if (!isCss) {
      link.as = "script";
      link.crossOrigin = "";
    }
    link.href = dep;
    document.head.appendChild(link);
    if (isCss) {
      return new Promise((res, rej) => {
        link.addEventListener("load", res);
        link.addEventListener("error", rej);
      });
    }
  })).then(() => baseModule());
};
var messages = {
  "de": {
    "select-language": (ctx) => {
      const { normalize: _normalize } = ctx;
      return _normalize(["Sprache ausw\xE4hlen"]);
    },
    "auth": {
      "title": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Jetzt mitmachen"]);
      },
      "subtitle": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Beginnen Sie mit der Erstellung Ihres Kontos"]);
      },
      "label": {
        "promotional": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Erhalten Sie Werbeangebote"]);
        }
      },
      "action": {
        "login": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Ich habe bereits ein Konto"]);
        },
        "signup": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Registrieren"]);
        }
      },
      "placeholder": {
        "name": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Name"]);
        },
        "email": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Mailadresse"]);
        },
        "password": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Passwort"]);
        },
        "passwordCheck": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Passwort\xFCberpr\xFCfung"]);
        }
      },
      "errors": {
        "name": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Ihr Name, Vorname ist erforderlich"]);
          }
        },
        "email": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Geben Sie Ihre E-Mail ein, sie wird f\xFCr die Anmeldung ben\xF6tigt"]);
          },
          "format": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Bitte geben Sie eine g\xFCltige E-Mail ein"]);
          }
        },
        "password": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Geben Sie Ihr Passwort mit mindestens 8 Zeichen ein, es wird f\xFCr die Anmeldung ben\xF6tigt"]);
          },
          "length": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Das Passwort sollte mindestens 8 Zeichen enthalten"]);
          }
        },
        "passwordCheck": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Bitte best\xE4tigen Sie Ihr Passwort"]);
          },
          "match": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Das Passwort stimmt nicht \xFCberein"]);
          }
        }
      }
    }
  },
  "en": {
    "select-language": (ctx) => {
      const { normalize: _normalize } = ctx;
      return _normalize(["Select Language"]);
    },
    "auth": {
      "title": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Join Us Now."]);
      },
      "subtitle": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Start by creating your account"]);
      },
      "label": {
        "promotional": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Receive promotional offers"]);
        }
      },
      "action": {
        "login": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["I already have an account"]);
        },
        "signup": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Sign Up"]);
        }
      },
      "placeholder": {
        "name": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Name"]);
        },
        "email": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Email Address"]);
        },
        "password": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Password"]);
        },
        "passwordCheck": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Password Verification"]);
        }
      },
      "errors": {
        "name": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Your name first name is required"]);
          }
        },
        "email": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Enter your email, it will be required to login"]);
          },
          "format": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Please, enter a valid email"]);
          }
        },
        "password": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Enter your password with at least 8 characters, it will be required to login"]);
          },
          "length": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["The password should contains at leat 8 characters"]);
          }
        },
        "passwordCheck": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Please, confirm your password"]);
          },
          "match": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["The password does not match"]);
          }
        }
      }
    }
  },
  "es-MX": {
    "select-language": (ctx) => {
      const { normalize: _normalize } = ctx;
      return _normalize(["Seleccione el idioma"]);
    },
    "auth": {
      "title": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["\xDAnete a nosotros ahora"]);
      },
      "subtitle": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Empieza creando tu cuenta"]);
      },
      "label": {
        "promotional": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Recibe ofertas promocionales"]);
        }
      },
      "action": {
        "login": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Ya tengo una cuenta"]);
        },
        "signup": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Registrarse"]);
        }
      },
      "placeholder": {
        "name": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Nombre"]);
        },
        "email": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Direcci\xF3n de correo electr\xF3nico"]);
        },
        "password": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Contrase\xF1a"]);
        },
        "passwordCheck": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Verificaci\xF3n de contrase\xF1a"]);
        }
      },
      "errors": {
        "name": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Su nombre es obligatorio"]);
          }
        },
        "email": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Introduzca su correo electr\xF3nico, ser\xE1 necesario para iniciar la sesi\xF3n"]);
          },
          "format": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Por favor, introduzca un correo electr\xF3nico v\xE1lido"]);
          }
        },
        "password": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Introduzca su contrase\xF1a con al menos 8 caracteres, ser\xE1 necesaria para iniciar la sesi\xF3n"]);
          },
          "length": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["La contrase\xF1a debe contener al menos 8 caracteres"]);
          }
        },
        "passwordCheck": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Por favor, confirme su contrase\xF1a"]);
          },
          "match": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["La contrase\xF1a no coincide"]);
          }
        }
      }
    }
  },
  "es": {
    "select-language": (ctx) => {
      const { normalize: _normalize } = ctx;
      return _normalize(["Seleccione el idioma"]);
    },
    "auth": {
      "title": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["\xDAnete a nosotros ahora"]);
      },
      "subtitle": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Empieza creando tu cuenta"]);
      },
      "label": {
        "promotional": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Recibe ofertas promocionales"]);
        }
      },
      "action": {
        "login": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Ya tengo una cuenta"]);
        },
        "signup": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Registrarse"]);
        }
      },
      "placeholder": {
        "name": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Nombre"]);
        },
        "email": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Direcci\xF3n de correo electr\xF3nico"]);
        },
        "password": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Contrase\xF1a"]);
        },
        "passwordCheck": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Verificaci\xF3n de contrase\xF1a"]);
        }
      },
      "errors": {
        "name": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Su nombre es obligatorio"]);
          }
        },
        "email": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Introduzca su correo electr\xF3nico, ser\xE1 necesario para iniciar la sesi\xF3n"]);
          },
          "format": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Por favor, introduzca un correo electr\xF3nico v\xE1lido"]);
          }
        },
        "password": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Introduzca su contrase\xF1a con al menos 8 caracteres, ser\xE1 necesaria para iniciar la sesi\xF3n"]);
          },
          "length": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["La contrase\xF1a debe contener al menos 8 caracteres"]);
          }
        },
        "passwordCheck": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Por favor, confirme su contrase\xF1a"]);
          },
          "match": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["La contrase\xF1a no coincide"]);
          }
        }
      }
    }
  },
  "fr": {
    "select-language": (ctx) => {
      const { normalize: _normalize } = ctx;
      return _normalize(["S\xE9lectionnez une langue"]);
    },
    "auth": {
      "title": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Rejoignez-nous maintenant"]);
      },
      "subtitle": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["Commencez par cr\xE9er votre compte"]);
      },
      "label": {
        "promotional": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Recevez des offres promotionnelles"]);
        }
      },
      "action": {
        "login": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["J'ai d\xE9j\xE0 un compte"]);
        },
        "signup": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Cr\xE9er un compte"]);
        }
      },
      "placeholder": {
        "name": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Nom"]);
        },
        "email": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Adresse \xE9lectronique"]);
        },
        "password": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Mot de passe"]);
        },
        "passwordCheck": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["V\xE9rification du mot de passe"]);
        }
      },
      "errors": {
        "name": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Votre nom, pr\xE9nom est obligatoire"]);
          }
        },
        "email": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Entrez votre email, il sera n\xE9cessaire pour vous connecter"]);
          },
          "format": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Veuillez entrer une adresse \xE9lectronique valide"]);
          }
        },
        "password": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Entrez votre mot de passe avec au moins 8 caract\xE8res, il vous sera demand\xE9 pour vous connecter"]);
          },
          "length": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Le mot de passe doit contenir au moins 8 caract\xE8res"]);
          }
        },
        "passwordCheck": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Veuillez confirmer votre mot de passe"]);
          },
          "match": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["Le mot de passe ne correspond pas"]);
          }
        }
      }
    }
  },
  "zh-CN": {
    "select-language": (ctx) => {
      const { normalize: _normalize } = ctx;
      return _normalize(["\u9009\u62E9\u8BED\u8A00"]);
    },
    "auth": {
      "title": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["\u73B0\u5728\u5C31\u52A0\u5165\u6211\u4EEC"]);
      },
      "subtitle": (ctx) => {
        const { normalize: _normalize } = ctx;
        return _normalize(["\u4ECE\u521B\u5EFA\u4F60\u7684\u8D26\u6237\u5F00\u59CB"]);
      },
      "label": {
        "promotional": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u63A5\u6536\u4FC3\u9500\u4F18\u60E0"]);
        }
      },
      "action": {
        "login": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u6211\u5DF2\u7ECF\u6709\u4E00\u4E2A\u8D26\u6237"]);
        },
        "signup": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u6CE8\u518C"]);
        }
      },
      "placeholder": {
        "name": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u59D3\u540D"]);
        },
        "email": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u7535\u5B50\u90AE\u4EF6\u5730\u5740"]);
        },
        "password": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u5BC6\u7801"]);
        },
        "passwordCheck": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u5BC6\u7801\u9A8C\u8BC1"]);
        }
      },
      "errors": {
        "name": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u60A8\u7684\u59D3\u540D\u662F\u5FC5\u586B\u7684"]);
          }
        },
        "email": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u8F93\u5165\u4F60\u7684\u7535\u5B50\u90AE\u4EF6\uFF0C\u5B83\u5C06\u662F\u767B\u5F55\u7684\u5FC5\u8981\u6761\u4EF6"]);
          },
          "format": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u8BF7\u8F93\u5165\u4E00\u4E2A\u6709\u6548\u7684\u7535\u5B50\u90AE\u4EF6"]);
          }
        },
        "password": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u8BF7\u8F93\u5165\u4F60\u7684\u5BC6\u7801\uFF0C\u81F3\u5C11\u67098\u4E2A\u5B57\u7B26\uFF0C\u767B\u5F55\u65F6\u5FC5\u987B\u8F93\u5165"]);
          },
          "length": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u5BC6\u7801\u5E94\u81F3\u5C11\u5305\u542B8\u4E2A\u5B57\u7B26"]);
          }
        },
        "passwordCheck": {
          "required": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u8BF7\u786E\u8BA4\u60A8\u7684\u5BC6\u7801"]);
          },
          "match": (ctx) => {
            const { normalize: _normalize } = ctx;
            return _normalize(["\u8BE5\u5BC6\u7801\u4E0D\u5339\u914D"]);
          }
        }
      }
    }
  }
};
function createI18n() {
  const defaultLocale = useStorage("locale", (navigator == null ? void 0 : navigator.language) || "en");
  const i18n = createI18n$1({
    locale: defaultLocale.value,
    messages
  });
  return i18n;
}
var AnimatedLogo_vue_vue_type_style_index_0_scoped_true_lang = "";
var _export_sfc = (sfc, props) => {
  for (const [key, val] of props) {
    sfc[key] = val;
  }
  return sfc;
};
const _withScopeId$1 = (n2) => (pushScopeId("data-v-47361cec"), n2 = n2(), popScopeId(), n2);
const _hoisted_1$y = /* @__PURE__ */ _withScopeId$1(() => /* @__PURE__ */ createBaseVNode("g", null, [
  /* @__PURE__ */ createBaseVNode("path", {
    class: "right",
    d: "M67.3,55.7L75.6,70l3.7,6.4l22.1,38.3l35.9-0.1L78.2,14.1L61.2,45L67.3,55.7z M130.1,114.5l-21.3,0.1"
  }),
  /* @__PURE__ */ createBaseVNode("path", {
    class: "left",
    d: "M39.1,145.9l11.7-20.3l2.7-4.7l3.7-6.4l22.1-38.3L61.2,45L3.6,145.9H39.1z M64.8,51.5l2.5,4.2l8.3,14.2V70\n			L64.8,51.5z"
  }),
  /* @__PURE__ */ createBaseVNode("path", {
    class: "bottom",
    d: "M39,145.9h117.4l-19.1-31.4l-80.1,0.1L39,145.9z M53.4,121l-10.6,18.5l7.9-13.9L53.4,121z"
  })
], -1));
const _hoisted_2$n = [
  _hoisted_1$y
];
const _sfc_main$10 = /* @__PURE__ */ defineComponent({
  props: {
    light: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    const router = useRouter();
    const isLoading = ref(false);
    router.beforeEach(() => {
      isLoading.value = true;
    });
    router.afterEach(() => {
      setTimeout(() => {
        isLoading.value = false;
      }, 200);
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("svg", {
        id: "OBJECTS",
        version: "1.1",
        xmlns: "http://www.w3.org/2000/svg",
        "xmlns:xlink": "http://www.w3.org/1999/xlink",
        x: "0px",
        y: "0px",
        viewBox: "0 0 160 160",
        style: { "enable-background": "new 0 0 160 160" },
        "xml:space": "preserve",
        class: normalizeClass([props.light && "is-light"])
      }, [
        createBaseVNode("g", {
          class: normalizeClass([isLoading.value && "is-roll"])
        }, _hoisted_2$n, 2)
      ], 2);
    };
  }
});
var __unplugin_components_0$2 = /* @__PURE__ */ _export_sfc(_sfc_main$10, [["__scopeId", "data-v-47361cec"]]);
const isLargeScreen = useMediaQuery("(min-width: 1023px)");
useMediaQuery("(min-width: 767px)");
const DARK_MODE_BODY_CLASS = "is-dark";
const preferredDark = usePreferredDark();
const colorSchema = useStorage("color-schema", "auto");
const isDark = computed({
  get() {
    return colorSchema.value === "auto" ? preferredDark.value : colorSchema.value === "dark";
  },
  set(v2) {
    if (v2 === preferredDark.value)
      colorSchema.value = "auto";
    else
      colorSchema.value = v2 ? "dark" : "light";
  }
});
const toggleDarkModeHandler = (event) => {
  const target = event.target;
  isDark.value = !target.checked;
};
watchEffect(() => {
  const body = document.documentElement;
  if (isDark.value) {
    body.classList.add(DARK_MODE_BODY_CLASS);
  } else {
    body.classList.remove(DARK_MODE_BODY_CLASS);
  }
});
const _hoisted_1$x = { class: "navbar-brand" };
const _hoisted_2$m = { class: "brand-icon" };
const _hoisted_3$h = /* @__PURE__ */ createBaseVNode("span", { "aria-hidden": "true" }, null, -1);
const _hoisted_4$a = /* @__PURE__ */ createBaseVNode("span", { "aria-hidden": "true" }, null, -1);
const _hoisted_5$7 = /* @__PURE__ */ createBaseVNode("span", { "aria-hidden": "true" }, null, -1);
const _hoisted_6$6 = [
  _hoisted_3$h,
  _hoisted_4$a,
  _hoisted_5$7
];
const _hoisted_7$5 = { class: "navbar-start" };
const _hoisted_8$4 = { class: "navbar-item" };
const _hoisted_9$3 = /* @__PURE__ */ createTextVNode(" Beta ");
const _hoisted_10$3 = { class: "navbar-end" };
const _hoisted_11$3 = { class: "navbar-item is-theme-toggle" };
const _hoisted_12$2 = { class: "theme-toggle" };
const _hoisted_13$2 = /* @__PURE__ */ createStaticVNode('<span class="toggler"><span class="dark"><i aria-hidden="true" class="iconify" data-icon="feather:moon"></i></span><span class="light"><i aria-hidden="true" class="iconify" data-icon="feather:sun"></i></span></span>', 1);
const _hoisted_14$2 = { class: "navbar-item" };
const _hoisted_15$1 = /* @__PURE__ */ createTextVNode(" Login ");
const _sfc_main$$ = /* @__PURE__ */ defineComponent({
  setup(__props) {
    const isMobileNavOpen = ref(false);
    useRouter();
    const scrollTo = VueScrollTo.scrollTo;
    const { y } = useWindowScroll();
    const isScrolling = computed(() => {
      return y.value > 30;
    });
    watchEffect(() => {
      if (isLargeScreen.value) {
        isMobileNavOpen.value = false;
      }
    });
    return (_ctx, _cache) => {
      const _component_AnimatedLogo = __unplugin_components_0$2;
      const _component_RouterLink = resolveComponent("RouterLink");
      return openBlock(), createElementBlock("nav", {
        class: normalizeClass(["navbar is-fixed-top is-transparent", [!unref(isScrolling) && "is-docked", isMobileNavOpen.value && "is-solid"]]),
        "aria-label": "main navigation"
      }, [
        createBaseVNode("div", _hoisted_1$x, [
          createBaseVNode("a", {
            href: "/",
            class: "navbar-item",
            onClick: _cache[0] || (_cache[0] = withModifiers(($event) => unref(scrollTo)("#app", 800), ["prevent"]))
          }, [
            createBaseVNode("div", _hoisted_2$m, [
              createVNode(_component_AnimatedLogo, {
                width: "34px",
                height: "34px"
              })
            ])
          ]),
          createBaseVNode("a", {
            role: "button",
            class: normalizeClass([[isMobileNavOpen.value && "is-active"], "navbar-burger burger"]),
            "aria-label": "menu",
            tabindex: "0",
            "aria-expanded": "false",
            onClick: _cache[1] || (_cache[1] = ($event) => isMobileNavOpen.value = !isMobileNavOpen.value)
          }, _hoisted_6$6, 2)
        ]),
        createBaseVNode("div", {
          class: normalizeClass(["navbar-menu", [isMobileNavOpen.value && "is-active"]])
        }, [
          createBaseVNode("div", _hoisted_7$5, [
            createBaseVNode("div", _hoisted_8$4, [
              createVNode(_component_RouterLink, {
                to: {
                  name: "index"
                },
                class: "nav-link",
                onClickPassive: _cache[2] || (_cache[2] = () => {
                  unref(scrollTo)("#features", 800, { offset: -50 });
                  isMobileNavOpen.value = false;
                })
              }, {
                default: withCtx(() => [
                  _hoisted_9$3
                ]),
                _: 1
              })
            ])
          ]),
          createBaseVNode("div", _hoisted_10$3, [
            createBaseVNode("div", _hoisted_11$3, [
              createBaseVNode("label", _hoisted_12$2, [
                withDirectives(createBaseVNode("input", {
                  id: "navbar-night-toggle--daynight",
                  "onUpdate:modelValue": _cache[3] || (_cache[3] = ($event) => isRef(isDark) ? isDark.value = $event : null),
                  type: "checkbox"
                }, null, 512), [
                  [vModelCheckbox, unref(isDark)]
                ]),
                _hoisted_13$2
              ])
            ]),
            createBaseVNode("div", _hoisted_14$2, [
              createVNode(_component_RouterLink, {
                to: { name: "auth-login" },
                class: "nav-link"
              }, {
                default: withCtx(() => [
                  _hoisted_15$1
                ]),
                _: 1
              })
            ])
          ])
        ], 2)
      ], 2);
    };
  }
});
const _sfc_main$_ = /* @__PURE__ */ defineComponent({
  props: {
    theme: { default: "darker" }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["minimal-wrapper", [props.theme]])
      }, [
        renderSlot(_ctx.$slots, "default")
      ], 2);
    };
  }
});
var _imports_0 = "/auth/dash/images/icons/hexagons/accent.svg";
var _imports_1 = "/auth/dash/images/icons/hexagons/accent-heavy.svg";
var _imports_2 = "/auth/dash/images/icons/hexagons/green.svg";
var _imports_3 = "/auth/dash/images/icons/hexagons/green-heavy.svg";
var _imports_4 = "/auth/dash/images/icons/hexagons/purple.svg";
var _imports_5 = "/auth/dash/images/icons/hexagons/purple-heavy.svg";
var index_vue_vue_type_style_index_0_lang = "";
const _hoisted_1$w = { class: "landing-page-wrapper" };
const _hoisted_2$l = {
  id: "Vuero-marketing",
  class: "hero marketing-hero is-left is-fullheight"
};
const _hoisted_3$g = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-1 light-image-l",
  src: _imports_0,
  alt: ""
}, null, -1);
const _hoisted_4$9 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-1 dark-image-l",
  src: _imports_1,
  alt: ""
}, null, -1);
const _hoisted_5$6 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-2 light-image-l",
  src: _imports_0,
  alt: ""
}, null, -1);
const _hoisted_6$5 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-2 dark-image-l",
  src: _imports_1,
  alt: ""
}, null, -1);
const _hoisted_7$4 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-3 light-image-l",
  src: _imports_2,
  alt: ""
}, null, -1);
const _hoisted_8$3 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-3 dark-image-l",
  src: _imports_3,
  alt: ""
}, null, -1);
const _hoisted_9$2 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-4 light-image-l",
  src: _imports_4,
  alt: ""
}, null, -1);
const _hoisted_10$2 = /* @__PURE__ */ createBaseVNode("img", {
  class: "hexagon hexagon-4 dark-image-l",
  src: _imports_5,
  alt: ""
}, null, -1);
const _hoisted_11$2 = /* @__PURE__ */ createBaseVNode("div", { id: "backtotop" }, [
  /* @__PURE__ */ createBaseVNode("a", {
    href: "#",
    "aria-label": "back to top"
  }, [
    /* @__PURE__ */ createBaseVNode("i", {
      "aria-hidden": "true",
      class: "fas fa-angle-up"
    })
  ])
], -1);
const _sfc_main$Z = /* @__PURE__ */ defineComponent({
  setup(__props) {
    useHead({
      title: "Vuero - A complete Vue 3 design system"
    });
    return (_ctx, _cache) => {
      const _component_LandingEmptyNavigation = _sfc_main$$;
      const _component_LandingLayout = _sfc_main$_;
      return openBlock(), createBlock(_component_LandingLayout, { theme: "light" }, {
        default: withCtx(() => [
          createBaseVNode("div", _hoisted_1$w, [
            createBaseVNode("div", _hoisted_2$l, [
              createVNode(_component_LandingEmptyNavigation),
              _hoisted_3$g,
              _hoisted_4$9,
              _hoisted_5$6,
              _hoisted_6$5,
              _hoisted_7$4,
              _hoisted_8$3,
              _hoisted_9$2,
              _hoisted_10$2
            ]),
            _hoisted_11$2
          ])
        ]),
        _: 1
      });
    };
  }
});
const routes = [{ "path": "/auth", "component": () => __vitePreload(() => import("./auth.cd05a9b4.js"), true ? ["assets/auth.cd05a9b4.js","assets/auth.3beb8099.css","assets/vendor.32cd07bc.js"] : void 0), "children": [{ "name": "auth", "path": "", "component": () => __vitePreload(() => import("./index.34e397f1.js"), true ? [] : void 0), "props": true, "redirect": { "name": "auth-login" } }, { "name": "auth-login", "path": "login", "component": () => __vitePreload(() => import("./login.b6271948.js"), true ? ["assets/login.b6271948.js","assets/vendor.32cd07bc.js","assets/Auth.af141906.js"] : void 0), "props": true }, { "name": "auth-signup", "path": "signup", "component": () => __vitePreload(() => import("./signup.0f02633f.js"), true ? ["assets/signup.0f02633f.js","assets/vendor.32cd07bc.js"] : void 0), "props": true }], "props": true }, { "path": "/app", "component": () => __vitePreload(() => import("./app.028723fe.js"), true ? ["assets/app.028723fe.js","assets/AppLayout.46013c7b.js","assets/AppLayout.d058e740.css","assets/vendor.32cd07bc.js","assets/Auth.af141906.js","assets/sidebarLayoutState.b3cee4ce.js"] : void 0), "children": [{ "name": "app", "path": "", "component": () => __vitePreload(() => import("./index.8f42c5fc.js"), true ? ["assets/index.8f42c5fc.js","assets/index.2a38b33c.css","assets/vendor.32cd07bc.js","assets/sidebarLayoutState.b3cee4ce.js"] : void 0), "props": true }], "props": true, "meta": { "requiresAuth": true } }, { "name": "index", "path": "/", "component": _sfc_main$Z, "props": true }, { "name": "pages-service-endpoint", "path": "/pages/:service/:endpoint", "component": () => __vitePreload(() => import("./index.bb26a04f.js"), true ? ["assets/index.bb26a04f.js","assets/AppLayout.46013c7b.js","assets/AppLayout.d058e740.css","assets/vendor.32cd07bc.js","assets/Auth.af141906.js","assets/sidebarLayoutState.b3cee4ce.js"] : void 0), "props": true }, { "name": "all", "path": "/:all(.*)*", "component": () => __vitePreload(() => import("./[...all].aa990024.js"), true ? ["assets/[...all].aa990024.js","assets/[...all].cd05e41e.css","assets/vendor.32cd07bc.js"] : void 0), "props": true }];
function createRouter() {
  const router = createRouter$1({
    history: createWebHistory("/auth/dash"),
    routes
  });
  router.beforeEach(() => {
    nprogress$1.exports.start();
  });
  router.afterEach(() => {
    nprogress$1.exports.done();
  });
  return router;
}
const useUserSession = defineStore("userSession", () => {
  const token = useStorage("token", {
    access: "",
    refresh: ""
  });
  const user = ref();
  const loading = ref(true);
  const isLoggedIn = computed(() => token.value.access !== void 0 && token.value.access !== "");
  function setUser(newUser) {
    user.value = newUser;
  }
  function setToken(accessToken, refreshToken) {
    token.value = {
      access: accessToken,
      refresh: refreshToken
    };
  }
  function setLoading(newLoading) {
    loading.value = newLoading;
  }
  async function logoutUser() {
    token.value = {
      access: "",
      refresh: ""
    };
    user.value = void 0;
  }
  return {
    user,
    token,
    isLoggedIn,
    loading,
    logoutUser,
    setUser,
    setToken,
    setLoading
  };
});
const apiSymbol = Symbol();
function provideApi() {
  const api = axios.create({
    baseURL: "http://bet.whatsnew.gr"
  });
  api.interceptors.request.use((config) => {
    const userSession = useUserSession();
    if (userSession.isLoggedIn) {
      config.headers = __spreadProps(__spreadValues({}, config.headers), {
        Authorization: `Bearer ${userSession.token}`
      });
    }
    return config;
  });
  provide(apiSymbol, api);
  return api;
}
const hslRe = /hsl\(\s*(\d+)((?:deg)|(?:turn)|(?:rad))?\s*,?\s*(\d+(?:\.\d+)?%)\s*,?\s*(\d+(?:\.\d+)?%)\s*\)/;
function HSLToHex(hslCss) {
  if (!hslCss) {
    return "#fff";
  }
  const res = hslRe.exec(hslCss);
  if (res === null) {
    return "#fff";
  }
  const [hueString, hueUnit, saturationString, luminanceString] = res.slice(1);
  if (!hueString || !saturationString || !luminanceString) {
    return "#fff";
  }
  let h2 = 0;
  let s = parseFloat(saturationString != null ? saturationString : "0");
  let l = parseFloat(luminanceString != null ? luminanceString : "0");
  switch (hueUnit) {
    case "deg":
      h2 = parseFloat(hueString.substr(0, hueString.length - 3));
      break;
    case "turn":
      h2 = Math.round(parseFloat(hueString.substr(0, hueString.length - 4)) * 360);
      break;
    case "rad":
      h2 = Math.round(parseFloat(hueString.substr(0, hueString.length - 3)) * (180 / Math.PI));
      break;
    default:
      h2 = parseFloat(hueString);
      break;
  }
  if (h2 >= 360)
    h2 %= 360;
  s /= 100;
  l /= 100;
  const c = (1 - Math.abs(2 * l - 1)) * s;
  const x = c * (1 - Math.abs(h2 / 60 % 2 - 1));
  const m = l - c / 2;
  let r = 0;
  let g = 0;
  let b = 0;
  if (0 <= h2 && h2 < 60) {
    r = c;
    g = x;
    b = 0;
  } else if (60 <= h2 && h2 < 120) {
    r = x;
    g = c;
    b = 0;
  } else if (120 <= h2 && h2 < 180) {
    r = 0;
    g = c;
    b = x;
  } else if (180 <= h2 && h2 < 240) {
    r = 0;
    g = x;
    b = c;
  } else if (240 <= h2 && h2 < 300) {
    r = x;
    g = 0;
    b = c;
  } else if (300 <= h2 && h2 < 360) {
    r = c;
    g = 0;
    b = x;
  }
  let rString = Math.round((r + m) * 255).toString(16);
  let gString = Math.round((g + m) * 255).toString(16);
  let bString = Math.round((b + m) * 255).toString(16);
  if (rString.length == 1)
    rString = "0" + rString;
  if (gString.length == 1)
    gString = "0" + gString;
  if (bString.length == 1)
    bString = "0" + bString;
  return "#" + rString + gString + bString;
}
const style = getComputedStyle(document.documentElement);
const themeColors = {
  primary: HSLToHex(style.getPropertyValue("--primary")),
  primaryMedium: "#b4e4ce",
  primaryLight: "#f7fcfa",
  secondary: "#ff227d",
  accent: "#797bf2",
  accentMedium: "#d4b3ff",
  accentLight: "#b8ccff",
  success: HSLToHex(style.getPropertyValue("--success")),
  info: HSLToHex(style.getPropertyValue("--info")),
  warning: HSLToHex(style.getPropertyValue("--warning")),
  danger: HSLToHex(style.getPropertyValue("--danger")),
  purple: HSLToHex(style.getPropertyValue("--purple")),
  blue: HSLToHex(style.getPropertyValue("--blue")),
  green: HSLToHex(style.getPropertyValue("--green")),
  yellow: HSLToHex(style.getPropertyValue("--yellow")),
  orange: HSLToHex(style.getPropertyValue("--orange")),
  lightText: "#a2a5b9",
  fadeGrey: "#ededed"
};
const notyf = new Notyf({
  duration: 2e3,
  position: {
    x: "right",
    y: "bottom"
  },
  types: [
    {
      type: "warning",
      background: themeColors.warning,
      icon: {
        className: "fas fa-hand-paper",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "info",
      background: themeColors.info,
      icon: {
        className: "fas fa-info-circle",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "primary",
      background: themeColors.primary,
      icon: {
        className: "fas fa-car-crash",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "accent",
      background: themeColors.accent,
      icon: {
        className: "fas fa-car-crash",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "purple",
      background: themeColors.purple,
      icon: {
        className: "fas fa-check",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "blue",
      background: themeColors.blue,
      icon: {
        className: "fas fa-check",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "green",
      background: themeColors.green,
      icon: {
        className: "fas fa-check",
        tagName: "i",
        text: ""
      }
    },
    {
      type: "orange",
      background: themeColors.orange,
      icon: {
        className: "fas fa-check",
        tagName: "i",
        text: ""
      }
    }
  ]
});
function useNotyf() {
  return {
    dismiss: (notification) => {
      notyf.dismiss(notification);
    },
    dismissAll: () => {
      notyf.dismissAll();
    },
    success: (payload) => {
      return notyf.success(payload);
    },
    error: (payload) => {
      return notyf.error(payload);
    },
    info: (payload) => {
      const options = {
        type: "info"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    },
    warning: (payload) => {
      const options = {
        type: "warning"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    },
    primary: (payload) => {
      const options = {
        type: "primary"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    },
    purple: (payload) => {
      const options = {
        type: "purple"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    },
    blue: (payload) => {
      const options = {
        type: "blue"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    },
    green: (payload) => {
      const options = {
        type: "green"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    },
    orange: (payload) => {
      const options = {
        type: "orange"
      };
      if (typeof payload === "string") {
        options.message = payload;
      } else {
        Object.assign(options, payload);
      }
      return notyf.open(options);
    }
  };
}
const CssUnitRe = /(\d*\.?\d+)\s?(cm|mm|in|px|pt|pc|em|ex|ch|rem|vw|vh|vmin|vmax|%)/;
var VPlaceload_vue_vue_type_style_index_0_scoped_true_lang = "";
const _sfc_main$Y = /* @__PURE__ */ defineComponent({
  props: {
    width: { default: "100%" },
    height: { default: "10px" },
    disabled: { type: Boolean },
    centered: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    useCssVars((_ctx) => ({
      "5f472bef": props.width,
      "0e8f8ec0": __props.height
    }));
    if (props.width.match(CssUnitRe) === null) {
      console.warn(`VPlaceload: invalid "${props.width}" width. Should be a valid css unit value.`);
    }
    if (props.height.match(CssUnitRe) === null) {
      console.warn(`VPlaceload: invalid "${props.height}" height. Should be a valid css unit value.`);
    }
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["content-shape", [props.centered && "is-centered", !props.disabled && "loads"]])
      }, null, 2);
    };
  }
});
var VPlaceload = /* @__PURE__ */ _export_sfc(_sfc_main$Y, [["__scopeId", "data-v-18376a5b"]]);
const _sfc_main$X = defineComponent({
  props: {
    to: {
      type: [Object, String],
      default: void 0
    },
    href: {
      type: String,
      default: void 0
    },
    icon: {
      type: String,
      default: void 0
    },
    iconCaret: {
      type: String,
      default: void 0
    },
    placeload: {
      type: String,
      default: void 0,
      validator: (value) => {
        if (value.match(CssUnitRe) === null) {
          console.warn(`VButton: invalid "${value}" placeload. Should be a valid css unit value.`);
        }
        return true;
      }
    },
    color: {
      type: String,
      default: void 0,
      validator: (value) => {
        if ([
          void 0,
          "primary",
          "info",
          "success",
          "warning",
          "danger",
          "white",
          "dark",
          "light"
        ].indexOf(value) === -1) {
          console.warn(`VButton: invalid "${value}" color. Should be primary, info, success, warning, danger, dark, light, white or undefined`);
          return false;
        }
        return true;
      }
    },
    size: {
      type: String,
      default: void 0,
      validator: (value) => {
        if ([void 0, "big", "huge"].indexOf(value) === -1) {
          console.warn(`VButton: invalid "${value}" size. Should be big, huge or undefined`);
          return false;
        }
        return true;
      }
    },
    dark: {
      type: String,
      default: void 0,
      validator: (value) => {
        if ([void 0, "1", "2", "3", "4", "5", "6"].indexOf(value) === -1) {
          console.warn(`VButton: invalid "${value}" dark. Should be 1, 2, 3, 4, 5, 6 or undefined`);
          return false;
        }
        return true;
      }
    },
    rounded: {
      type: Boolean,
      default: false
    },
    bold: {
      type: Boolean,
      default: false
    },
    fullwidth: {
      type: Boolean,
      default: false
    },
    light: {
      type: Boolean,
      default: false
    },
    raised: {
      type: Boolean,
      default: false
    },
    elevated: {
      type: Boolean,
      default: false
    },
    outlined: {
      type: Boolean,
      default: false
    },
    darkOutlined: {
      type: Boolean,
      default: false
    },
    loading: {
      type: Boolean,
      default: false
    },
    lower: {
      type: Boolean,
      default: false
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  setup(props, { slots, attrs }) {
    const classes = computed(() => {
      var _a;
      const defaultClasses = (_a = attrs == null ? void 0 : attrs.class) != null ? _a : [];
      return [
        ...defaultClasses,
        "button",
        "v-button",
        props.disabled && "is-disabled",
        props.rounded && "is-rounded",
        props.bold && "is-bold",
        props.size && `is-${props.size}`,
        props.lower && "is-lower",
        props.fullwidth && "is-fullwidth",
        props.outlined && "is-outlined",
        props.dark && `is-dark-bg-${props.dark}`,
        props.darkOutlined && "is-dark-outlined",
        props.raised && "is-raised",
        props.elevated && "is-elevated",
        props.loading && !props.placeload && "is-loading",
        props.color && `is-${props.color}`,
        props.light && "is-light"
      ];
    });
    const isIconify = computed(() => props.icon && props.icon.indexOf(":") !== -1);
    const isCaretIconify = computed(() => props.iconCaret && props.iconCaret.indexOf(":") !== -1);
    const getChildrens = () => {
      var _a;
      const childrens = [];
      let iconWrapper;
      if (isIconify.value) {
        const icon = h("i", {
          "aria-hidden": true,
          class: "iconify",
          "data-icon": props.icon
        });
        iconWrapper = h("span", { class: "icon" }, icon);
      } else if (props.icon) {
        const icon = h("i", { "aria-hidden": true, class: props.icon });
        iconWrapper = h("span", { class: "icon" }, icon);
      }
      let caretWrapper;
      if (isCaretIconify.value) {
        const caret = h("i", {
          "aria-hidden": true,
          class: "iconify",
          "data-icon": props.iconCaret
        });
        caretWrapper = h("span", { class: "caret" }, caret);
      } else if (props.iconCaret) {
        const caret = h("i", { "aria-hidden": true, class: props.iconCaret });
        caretWrapper = h("span", { class: "caret" }, caret);
      }
      if (iconWrapper) {
        childrens.push(iconWrapper);
      }
      if (props.placeload) {
        childrens.push(h(VPlaceload, {
          width: props.placeload
        }));
      } else {
        childrens.push(h("span", (_a = slots.default) == null ? void 0 : _a.call(slots)));
      }
      if (caretWrapper) {
        childrens.push(caretWrapper);
      }
      return childrens;
    };
    return () => {
      if (props.to) {
        return h(RouterLink, __spreadProps(__spreadValues({}, attrs), {
          "aria-hidden": !!props.placeload && true,
          to: props.to,
          class: ["button", ...classes.value]
        }), {
          default: getChildrens
        });
      } else if (props.href) {
        return h("a", __spreadProps(__spreadValues({}, attrs), {
          "aria-hidden": !!props.placeload && true,
          href: props.href,
          class: classes.value
        }), {
          default: getChildrens
        });
      }
      return h("button", __spreadProps(__spreadValues({
        type: "button"
      }, attrs), {
        "aria-hidden": !!props.placeload && true,
        disabled: props.disabled,
        class: ["button", ...classes.value]
      }), {
        default: getChildrens
      });
    };
  }
});
const _sfc_main$W = /* @__PURE__ */ defineComponent({
  props: {
    align: { default: void 0 },
    addons: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["buttons", [props.addons && "has-addons", props.align && `is-${props.align}`]])
      }, [
        renderSlot(_ctx.$slots, "default")
      ], 2);
    };
  }
});
const _sfc_main$V = /* @__PURE__ */ defineComponent({
  props: {
    radius: { default: void 0 },
    color: { default: void 0 },
    elevated: { type: Boolean, default: false }
  },
  setup(__props) {
    const props = __props;
    const cardRadius = computed(() => {
      if (props.radius === "smooth") {
        return "s-card";
      } else if (props.radius === "rounded") {
        return "l-card";
      }
      return "r-card";
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass([
          unref(cardRadius),
          __props.elevated && "is-raised",
          props.color && `is-${props.color}`
        ])
      }, [
        renderSlot(_ctx.$slots, "default")
      ], 2);
    };
  }
});
function registerSW(options = {}) {
  const {
    immediate = false,
    onNeedRefresh,
    onOfflineReady,
    onRegistered,
    onRegisterError
  } = options;
  let wb;
  let registration;
  const updateServiceWorker = async (reloadPage = true) => {
    {
      if (reloadPage) {
        wb == null ? void 0 : wb.addEventListener("controlling", (event) => {
          if (event.isUpdate)
            window.location.reload();
        });
      }
      if (registration && registration.waiting) {
        await n(registration.waiting, { type: "SKIP_WAITING" });
      }
    }
  };
  if ("serviceWorker" in navigator) {
    wb = new v("/sw.js", { scope: "/" });
    wb.addEventListener("activated", (event) => {
      if (event.isUpdate)
        ;
      else
        onOfflineReady == null ? void 0 : onOfflineReady();
    });
    {
      const showSkipWaitingPrompt = () => {
        onNeedRefresh == null ? void 0 : onNeedRefresh();
      };
      wb.addEventListener("waiting", showSkipWaitingPrompt);
      wb.addEventListener("externalwaiting", showSkipWaitingPrompt);
    }
    wb.register({ immediate }).then((r) => {
      registration = r;
      onRegistered == null ? void 0 : onRegistered(r);
    }).catch((e) => {
      onRegisterError == null ? void 0 : onRegisterError(e);
    });
  }
  return updateServiceWorker;
}
function useRegisterSW(options = {}) {
  const {
    immediate = true,
    onNeedRefresh,
    onOfflineReady,
    onRegistered,
    onRegisterError
  } = options;
  const needRefresh = ref(false);
  const offlineReady = ref(false);
  const updateServiceWorker = registerSW({
    immediate,
    onNeedRefresh() {
      needRefresh.value = true;
      onNeedRefresh == null ? void 0 : onNeedRefresh();
    },
    onOfflineReady() {
      offlineReady.value = true;
      onOfflineReady == null ? void 0 : onOfflineReady();
    },
    onRegistered,
    onRegisterError
  });
  return {
    updateServiceWorker,
    offlineReady,
    needRefresh
  };
}
var VReloadPrompt_vue_vue_type_style_index_0_lang = "";
function block0$2(Component) {
  Component.__i18n = Component.__i18n || [];
  Component.__i18n.push({
    "locale": "",
    "resource": {
      "de": {
        "offline-ready": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize([_interpolate(_named("appName")), " ist bereit, offline zu arbeiten"]);
        },
        "need-refresh": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Eine neue Version von ", _interpolate(_named("appName")), " ist verf\xFCgbar, klicken Sie auf die Schaltfl\xE4che Neu laden, um sie zu aktualisieren."]);
        },
        "reload-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Neu laden"]);
        },
        "close-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Schlie\xDFen"]);
        }
      },
      "en": {
        "offline-ready": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize([_interpolate(_named("appName")), " is ready to work offline"]);
        },
        "need-refresh": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["A new version of ", _interpolate(_named("appName")), " is available, click on reload button to update."]);
        },
        "reload-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Reload"]);
        },
        "close-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Close"]);
        }
      },
      "es-MX": {
        "offline-ready": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize([_interpolate(_named("appName")), " est\xE1 listo para trabajar sin conexi\xF3n"]);
        },
        "need-refresh": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Una nueva versi\xF3n de ", _interpolate(_named("appName")), " est\xE1 disponible, haga clic en el bot\xF3n Recarga para actualizar."]);
        },
        "reload-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Recarga"]);
        },
        "close-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Cerrar"]);
        }
      },
      "es": {
        "offline-ready": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize([_interpolate(_named("appName")), " est\xE1 listo para trabajar sin conexi\xF3n"]);
        },
        "need-refresh": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Una nueva versi\xF3n de ", _interpolate(_named("appName")), " est\xE1 disponible, haga clic en el bot\xF3n Recarga para actualizar."]);
        },
        "reload-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Recarga"]);
        },
        "close-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Cerrar"]);
        }
      },
      "fr": {
        "offline-ready": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize([_interpolate(_named("appName")), " est pr\xEAt \xE0 \xEAtre utilis\xE9 hors ligne"]);
        },
        "need-refresh": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Une nouvelle version de ", _interpolate(_named("appName")), " est disponible, cliquez sur le bouton Recharger pour la mettre \xE0 jour."]);
        },
        "reload-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Recharger"]);
        },
        "close-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Fermer"]);
        }
      },
      "zh-CN": {
        "offline-ready": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize([_interpolate(_named("appName")), "\u5DF2\u51C6\u5907\u597D\u8131\u673A\u5DE5\u4F5C"]);
        },
        "need-refresh": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["\u65B0\u7248\u672C\u7684", _interpolate(_named("appName")), "\u5DF2\u7ECF\u53EF\u7528\uFF0C\u70B9\u51FB\u91CD\u65B0\u52A0\u8F7D\u6309\u94AE\u6765\u66F4\u65B0\u3002"]);
        },
        "reload-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u91CD\u65B0\u52A0\u8F7D"]);
        },
        "close-button": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u5173\u95ED"]);
        }
      }
    }
  });
}
const _hoisted_1$v = { class: "pwa-message" };
const _hoisted_2$k = { key: 0 };
const _hoisted_3$f = { key: 1 };
const _sfc_main$U = /* @__PURE__ */ defineComponent({
  props: {
    appName: null
  },
  setup(__props) {
    const props = __props;
    const loading = ref(false);
    const { t } = useI18n();
    const { offlineReady, needRefresh, updateServiceWorker } = useRegisterSW();
    const close = async () => {
      loading.value = false;
      offlineReady.value = false;
      needRefresh.value = false;
    };
    const update = async () => {
      loading.value = true;
      await updateServiceWorker();
      loading.value = false;
    };
    return (_ctx, _cache) => {
      const _component_VButton = _sfc_main$X;
      const _component_VButtons = _sfc_main$W;
      const _component_VCard = _sfc_main$V;
      return openBlock(), createBlock(Transition, { name: "from-bottom" }, {
        default: withCtx(() => [
          unref(offlineReady) || unref(needRefresh) ? (openBlock(), createBlock(_component_VCard, {
            key: 0,
            class: "pwa-toast",
            role: "alert",
            radius: "smooth"
          }, {
            default: withCtx(() => [
              createBaseVNode("div", _hoisted_1$v, [
                unref(offlineReady) ? (openBlock(), createElementBlock("span", _hoisted_2$k, toDisplayString(unref(t)("offline-ready", { appName: props.appName })), 1)) : (openBlock(), createElementBlock("span", _hoisted_3$f, toDisplayString(unref(t)("need-refresh", { appName: props.appName })), 1))
              ]),
              createVNode(_component_VButtons, { align: "right" }, {
                default: withCtx(() => [
                  unref(needRefresh) ? (openBlock(), createBlock(_component_VButton, {
                    key: 0,
                    color: "primary",
                    icon: "ion:reload-outline",
                    loading: loading.value,
                    onClick: _cache[0] || (_cache[0] = () => update())
                  }, {
                    default: withCtx(() => [
                      createTextVNode(toDisplayString(unref(t)("reload-button")), 1)
                    ]),
                    _: 1
                  }, 8, ["loading"])) : createCommentVNode("", true),
                  createVNode(_component_VButton, {
                    icon: "feather:x",
                    onClick: close
                  }, {
                    default: withCtx(() => [
                      createTextVNode(toDisplayString(unref(t)("close-button")), 1)
                    ]),
                    _: 1
                  })
                ]),
                _: 1
              })
            ]),
            _: 1
          })) : createCommentVNode("", true)
        ]),
        _: 1
      });
    };
  }
});
if (typeof block0$2 === "function")
  block0$2(_sfc_main$U);
async function createApp({ enhanceApp }) {
  const head = createHead();
  const i18n = createI18n();
  const router = createRouter();
  const pinia = createPinia();
  const app = createApp$1({
    setup() {
      provideApi();
      return () => {
        const defaultSlot = ({ Component: _Component }) => {
          const Component = resolveDynamicComponent(_Component);
          return [
            h(Transition, { name: "fade-slow", mode: "out-in" }, {
              default: () => [h(Component)]
            })
          ];
        };
        return [
          h(RouterView, null, {
            default: defaultSlot
          }),
          h(_sfc_main$U, { appName: "Vuero" })
        ];
      };
    }
  });
  router.beforeEach((to, from) => {
    const userSession = useUserSession();
    if (to.meta.requiresAuth && !userSession.isLoggedIn) {
      const notif = useNotyf();
      notif.error({
        message: "Sorry, you should loggin to access this section (anything will work)",
        duration: 7e3
      });
      return {
        name: "auth",
        query: { redirect: to.fullPath }
      };
    }
  });
  app.use(head);
  app.use(router);
  app.use(i18n);
  app.use(pinia);
  if (enhanceApp) {
    await enhanceApp(app);
  }
  return {
    app,
    router,
    head,
    i18n
  };
}
var VFlex_vue_vue_type_style_index_0_lang = "";
const _hoisted_1$u = { class: "v-flex" };
const _sfc_main$T = /* @__PURE__ */ defineComponent({
  props: {
    inline: { type: Boolean },
    flexDirection: { default: "row" },
    flexWrap: { default: "nowrap" },
    justifyContent: { default: "normal" },
    alignItems: { default: "normal" },
    alignContent: { default: "normal" },
    rowGap: { default: "normal" },
    columnGap: { default: "normal" }
  },
  setup(__props) {
    const props = __props;
    useCssVars((_ctx) => ({
      "3e3bf628": unref(display),
      "54feccb2": props.flexDirection,
      "52495737": props.flexWrap,
      "78bf6fc6": props.justifyContent,
      "61222e0f": props.alignItems,
      "5be32308": props.alignContent,
      "5d475a20": props.rowGap,
      "3fcea268": props.columnGap
    }));
    const display = computed(() => props.inline ? "inline-flex" : "flex");
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", _hoisted_1$u, [
        renderSlot(_ctx.$slots, "default")
      ]);
    };
  }
});
function useProperties() {
  const apply2 = (properties, config, scope = {}) => {
    Object.keys(properties).forEach((el) => {
      _.set(config, el, replaceVarInString(properties[el], scope));
    });
    return config;
  };
  const replaceVarInString = (prop, scope) => {
    let text = JSON.parse(JSON.stringify(prop));
    if (typeof text === "string") {
      Object.keys(scope).forEach((k) => {
        text = text.replace(`$${k}`, _.get(scope, k));
      });
    } else if (typeof text === "object") {
      text = replaceVarInObject(prop, scope);
    }
    return text;
  };
  const replaceVarInObject = (prop, scope) => {
    const text = JSON.parse(JSON.stringify(prop));
    Object.keys(text).forEach((k) => {
      if (text[k]) {
        text[k] = replaceVarInString(text[k], scope);
      }
    });
    return text;
  };
  return {
    apply: apply2
  };
}
function setup$x(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    direction: "row",
    wrap: "wrap",
    justify: "normal",
    align_items: "normal",
    align_content: "normal",
    row_gap: "",
    column_gap: "row",
    inline: false,
    children: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  return (_ctx, _cache) => {
    const _component_vFlex = _sfc_main$T;
    return openBlock(), createBlock(_component_vFlex, {
      "flex-direction": unref(config).direction,
      "flex-wrap": unref(config).wrap,
      "align-items": unref(config).align_items,
      "align-content": unref(config).align_content,
      "row-gap": unref(config).row_gap,
      "column-gap": unref(config).column_gap,
      inline: unref(config).inline,
      "justify-content": unref(config).justify
    }, {
      default: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(__props.properties.children, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: __props.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]),
      _: 1
    }, 8, ["flex-direction", "flex-wrap", "align-items", "align-content", "row-gap", "column-gap", "inline", "justify-content"]);
  };
}
const __default__$x = {
  name: "gFlex"
};
const _sfc_main$S = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$x), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$x
}));
var VFlexItem_vue_vue_type_style_index_0_lang = "";
const _hoisted_1$t = { class: "v-flex-item" };
const _sfc_main$R = /* @__PURE__ */ defineComponent({
  props: {
    order: { default: 0 },
    flexGrow: { default: 0 },
    flexShrink: { default: 0 },
    flexBasis: { default: "auto" },
    alignSelf: { default: "auto" }
  },
  setup(__props) {
    const props = __props;
    useCssVars((_ctx) => ({
      "2ff03aec": props.order,
      "7990c964": props.flexGrow,
      "30a71af8": props.flexShrink,
      "b924a73a": props.flexBasis,
      "7713848f": props.alignSelf
    }));
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", _hoisted_1$t, [
        renderSlot(_ctx.$slots, "default")
      ]);
    };
  }
});
function setup$w(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    grow: 0,
    shrink: 0,
    order: 0
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  return (_ctx, _cache) => {
    const _component_vFlexItem = _sfc_main$R;
    return openBlock(), createBlock(_component_vFlexItem, {
      "flex-order": unref(config).order,
      "flex-grow": unref(config).grow,
      "flex-shrink": unref(config).shrink
    }, {
      default: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(__props.properties.children, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: __props.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]),
      _: 1
    }, 8, ["flex-order", "flex-grow", "flex-shrink"]);
  };
}
const __default__$w = {
  name: "gFlexItem"
};
const _sfc_main$Q = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$w), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$w
}));
const _hoisted_1$s = {
  key: 0,
  class: "card-head"
};
const _hoisted_2$j = { class: "left" };
const _hoisted_3$e = { class: "right" };
const _hoisted_4$8 = { class: "card-body" };
const _hoisted_5$5 = {
  key: 1,
  class: "card-foot"
};
const _hoisted_6$4 = { class: "left" };
const _hoisted_7$3 = { class: "right" };
const _sfc_main$P = /* @__PURE__ */ defineComponent({
  props: {
    radius: { default: "regular" },
    color: null
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass([
          props.radius === "regular" && "s-card-advanced",
          props.radius === "smooth" && "r-card-advanced",
          props.radius === "rounded" && "l-card-advanced"
        ])
      }, [
        _ctx.$slots["header-left"] || _ctx.$slots["header-right"] ? (openBlock(), createElementBlock("div", _hoisted_1$s, [
          createBaseVNode("div", _hoisted_2$j, [
            renderSlot(_ctx.$slots, "header-left")
          ]),
          createBaseVNode("div", _hoisted_3$e, [
            renderSlot(_ctx.$slots, "header-right")
          ])
        ])) : createCommentVNode("", true),
        createBaseVNode("div", _hoisted_4$8, [
          renderSlot(_ctx.$slots, "content")
        ]),
        _ctx.$slots["footer-left"] || _ctx.$slots["footer-right"] ? (openBlock(), createElementBlock("div", _hoisted_5$5, [
          createBaseVNode("div", _hoisted_6$4, [
            renderSlot(_ctx.$slots, "footer-left")
          ]),
          createBaseVNode("div", _hoisted_7$3, [
            renderSlot(_ctx.$slots, "footer-right")
          ])
        ])) : createCommentVNode("", true)
      ], 2);
    };
  }
});
function setup$v(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    radius: "regular",
    header_left: [],
    header_right: [],
    children: [],
    footer_left: [],
    footer_right: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  return (_ctx, _cache) => {
    const _component_VCardAdvanced = _sfc_main$P;
    return openBlock(), createBlock(_component_VCardAdvanced, {
      radius: unref(config).radius
    }, createSlots({
      content: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: __props.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]),
      _: 2
    }, [
      unref(config).header_left.length ? {
        name: "header-left",
        fn: withCtx(() => [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).header_left, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              properties: item.props,
              scope: __props.scope,
              key: i
            }, null, 8, ["properties", "scope"]);
          }), 128))
        ])
      } : void 0,
      unref(config).header_right.length ? {
        name: "header-right",
        fn: withCtx(() => [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).header_right, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              properties: item.props,
              scope: __props.scope,
              key: i
            }, null, 8, ["properties", "scope"]);
          }), 128))
        ])
      } : void 0,
      unref(config).footer_left.length ? {
        name: "footer-left",
        fn: withCtx(() => [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).footer_left, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              properties: item.props,
              scope: __props.scope,
              key: i
            }, null, 8, ["properties", "scope"]);
          }), 128))
        ])
      } : void 0,
      unref(config).footer_right.length ? {
        name: "footer-right",
        fn: withCtx(() => [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).footer_right, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              properties: item.props,
              scope: __props.scope,
              key: i
            }, null, 8, ["properties", "scope"]);
          }), 128))
        ])
      } : void 0
    ]), 1032, ["radius"]);
  };
}
const __default__$v = {
  name: "gCard"
};
const _sfc_main$O = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$v), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$v
}));
function setup$u(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    multiline: true,
    mobile: 3,
    tablet: 3,
    desktop: 3
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  const classes = computed(() => {
    let classes2 = {
      columns: true,
      "is-multiline": config.multiline,
      "is-variable": true
    };
    const mobile = `is-${config.mobile}-mobile`;
    classes2[mobile] = true;
    const tablet = `is-${config.tablet}-tablet`;
    classes2[tablet] = true;
    const desktop = `is-${config.desktop}-desktop`;
    classes2[desktop] = true;
    return classes2;
  });
  return (_ctx, _cache) => {
    return openBlock(), createElementBlock("div", {
      class: normalizeClass(unref(classes))
    }, [
      (openBlock(true), createElementBlock(Fragment, null, renderList(__props.properties.children, (item, i) => {
        return openBlock(), createBlock(resolveDynamicComponent(item.component), {
          properties: item.props,
          scope: __props.scope,
          key: i
        }, null, 8, ["properties", "scope"]);
      }), 128))
    ], 2);
  };
}
const __default__$u = {
  name: "gRow"
};
const _sfc_main$N = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$u), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$u
}));
function setup$t(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    mobile: 12,
    tablet: 12,
    desktop: 12
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  const classes = computed(() => {
    let classes2 = {
      column: true
    };
    const mobile = `is-${config.mobile}-mobile`;
    classes2[mobile] = true;
    const tablet = `is-${config.tablet}-tablet`;
    classes2[tablet] = true;
    const desktop = `is-${config.desktop}-desktop`;
    classes2[desktop] = true;
    return classes2;
  });
  return (_ctx, _cache) => {
    return openBlock(), createElementBlock("div", {
      class: normalizeClass(unref(classes))
    }, [
      (openBlock(true), createElementBlock(Fragment, null, renderList(__props.properties.children, (item, i) => {
        return openBlock(), createBlock(resolveDynamicComponent(item.component), {
          properties: item.props,
          scope: __props.scope,
          key: i
        }, null, 8, ["properties", "scope"]);
      }), 128))
    ], 2);
  };
}
const __default__$t = {
  name: "gCol"
};
const _sfc_main$M = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$t), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$t
}));
const alert$1 = {
  namespaced: true,
  state: {
    last_event_id: 0,
    events: [],
    data: {}
  },
  actions: {
    newEvent({ commit }, payload) {
      commit("pushEvent", payload);
    },
    bind({ commit }, payload) {
      commit("bind", payload);
    },
    push({ commit }, payload) {
      commit("push", payload);
    },
    clearTopic({ commit }, name) {
      commit("clearTopic", name);
    },
    clearEvents({ commit }) {
      commit("clearEvents");
    },
    clearAll({ commit }) {
      commit("clearEvents");
      commit("clearData");
    }
  },
  mutations: {
    clearTopic(state, name) {
      state.events = state.events.filter((el) => {
        el.topic !== name;
      });
    },
    clearEvents(state) {
      state.last_event_id = 0;
      state.events = [];
    },
    clearData(state) {
      state.data = {};
    },
    pushEvent(state, payload) {
      state.last_event_id += 1;
      payload.id = state.last_event_id;
      state.events.push(payload);
      if (state.events.length >= 4) {
        state.events.shift();
      }
    },
    select: (state, payload) => {
      let selected = _.get(state.data, payload.key);
      const identifier = payload.identifier;
      if (!selected) {
        selected = [];
      }
      const index = selected.findIndex((el) => {
        return el[identifier] === payload.value[identifier];
      });
      if (index > -1) {
        selected.splice(index, 1);
      } else {
        selected.push(payload.value);
      }
      _.set(state.data, payload.key, selected);
    },
    bind(state, payload) {
      _.set(state.data, payload.key, payload.value);
    }
  },
  getters: {
    events(state) {
      return state.events;
    },
    data(state) {
      return state.data;
    },
    last_event_id(state) {
      return state.last_event_id;
    }
  }
};
const store = createStore({
  modules: {
    components: alert$1
  }
});
class EventRepo {
  constructor() {
    __publicField(this, "topic");
  }
  listen(topic) {
    this.topic = topic;
  }
  publish(action, value, topic = this.topic) {
    store.dispatch("components/newEvent", {
      topic,
      action,
      payload: value
    });
  }
  lastEvent() {
    const events = store.getters["components/events"];
    const topic_events = events.filter((el) => {
      return el.topic === this.topic;
    });
    return topic_events[topic_events.length - 1];
  }
  clearAll() {
    store.dispatch("components/clearAll");
  }
  lastId() {
    return store.getters["components/last_event_id"];
  }
}
function useEvents() {
  const events = new EventRepo();
  const last_event_id = ref(events.lastId());
  let actions = reactive({});
  const listenTopic = (config) => {
    events.listen(config.key);
  };
  const last_event = computed(() => {
    return events.lastEvent();
  });
  const publish = function(action2, value, topic) {
    events.publish(action2, value, topic);
  };
  const action = function action2(name, callback) {
    _.set(actions, name, callback);
  };
  const clearAll = function() {
    events.clearAll();
  };
  const callAction = (event) => {
    if (!event || event.id == last_event_id.value) {
      return;
    }
    last_event_id.value = event.id;
    actions[event.action](event.payload);
  };
  const listen = watch(last_event, (newEvent) => {
    callAction(newEvent);
  }, {
    immediate: false,
    deep: true
  });
  return {
    listen,
    last_event,
    listenTopic,
    action,
    callAction,
    publish,
    clearAll
  };
}
function setup$s(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  reactive({
    topic: {}
  });
  const config = reactive({
    title: "",
    icon: "",
    type: "primary",
    align: "",
    rounded: false,
    outlined: false,
    events: {
      name: "stateRepo",
      key: ""
    },
    on_click: [
      {
        topic: "form",
        action: "update",
        value: "lora"
      }
    ]
  });
  const { publish } = useEvents(config.events);
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  function onClick() {
    config.on_click.forEach((btn_event) => {
      return publish(btn_event.action, btn_event.payload, btn_event.topic);
    });
  }
  return (_ctx, _cache) => {
    const _component_vButton = _sfc_main$X;
    return openBlock(), createBlock(_component_vButton, {
      onClick,
      color: unref(config).type,
      outlined: unref(config).outlined,
      icon: unref(config).icon,
      align: unref(config).align,
      rounded: unref(config).rounded
    }, {
      default: withCtx(() => [
        createTextVNode(toDisplayString(unref(config).title), 1)
      ]),
      _: 1
    }, 8, ["color", "outlined", "icon", "align", "rounded"]);
  };
}
const __default__$s = {
  name: "gButton"
};
const _sfc_main$L = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$s), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$s
}));
var VControl_vue_vue_type_style_index_0_scoped_true_lang = "";
const _withScopeId = (n2) => (pushScopeId("data-v-aad2da70"), n2 = n2(), popScopeId(), n2);
const _hoisted_1$r = {
  key: 0,
  class: "form-icon"
};
const _hoisted_2$i = ["data-icon"];
const _hoisted_3$d = {
  key: 1,
  class: "validation-icon is-success"
};
const _hoisted_4$7 = /* @__PURE__ */ _withScopeId(() => /* @__PURE__ */ createBaseVNode("i", {
  "aria-hidden": "true",
  class: "iconify",
  "data-icon": "feather:check"
}, null, -1));
const _hoisted_5$4 = [
  _hoisted_4$7
];
const _hoisted_6$3 = {
  key: 2,
  class: "validation-icon is-error"
};
const _hoisted_7$2 = /* @__PURE__ */ _withScopeId(() => /* @__PURE__ */ createBaseVNode("i", {
  "aria-hidden": "true",
  class: "iconify",
  "data-icon": "feather:x"
}, null, -1));
const _hoisted_8$2 = [
  _hoisted_7$2
];
const _sfc_main$K = /* @__PURE__ */ defineComponent({
  props: {
    icon: { default: void 0 },
    isValid: { type: Boolean },
    hasError: { type: Boolean },
    loading: { type: Boolean },
    expanded: { type: Boolean },
    textaddon: { type: Boolean },
    nogrow: { type: Boolean },
    subcontrol: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    const isIconify = computed(() => {
      return props.icon && props.icon.indexOf(":") !== -1;
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["control", [
          __props.icon && "has-icon",
          __props.loading && "is-loading",
          __props.expanded && "is-expanded",
          __props.nogrow && "is-nogrow",
          __props.textaddon && "is-textarea-addon",
          __props.isValid && "has-validation has-success",
          __props.hasError && "has-validation has-error",
          __props.subcontrol && "subcontrol"
        ]])
      }, [
        renderSlot(_ctx.$slots, "default", {}, void 0, true),
        __props.icon ? (openBlock(), createElementBlock("div", _hoisted_1$r, [
          unref(isIconify) ? (openBlock(), createElementBlock("i", {
            key: 0,
            "aria-hidden": "true",
            class: "iconify",
            "data-icon": __props.icon
          }, null, 8, _hoisted_2$i)) : (openBlock(), createElementBlock("i", {
            key: 1,
            "aria-hidden": "true",
            class: normalizeClass(__props.icon)
          }, null, 2))
        ])) : createCommentVNode("", true),
        __props.isValid ? (openBlock(), createElementBlock("div", _hoisted_3$d, _hoisted_5$4)) : __props.hasError ? (openBlock(), createElementBlock("div", _hoisted_6$3, _hoisted_8$2)) : createCommentVNode("", true),
        renderSlot(_ctx.$slots, "extra", {}, void 0, true)
      ], 2);
    };
  }
});
var __unplugin_components_0$1 = /* @__PURE__ */ _export_sfc(_sfc_main$K, [["__scopeId", "data-v-aad2da70"]]);
const _hoisted_1$q = { class: "field-label is-normal" };
const _hoisted_2$h = { class: "label" };
const _hoisted_3$c = { class: "field-body" };
const _hoisted_4$6 = { class: "label" };
const _sfc_main$J = /* @__PURE__ */ defineComponent({
  props: {
    label: { default: void 0 },
    addons: { type: Boolean },
    textaddon: { type: Boolean },
    grouped: { type: Boolean },
    multiline: { type: Boolean },
    horizontal: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["field", [
          props.addons && "has-addons",
          props.textaddon && "has-textarea-addon",
          props.grouped && "is-grouped",
          props.grouped && props.multiline && "is-grouped-multiline",
          props.horizontal && "is-horizontal"
        ]])
      }, [
        typeof props.label === "string" && props.horizontal ? (openBlock(), createElementBlock(Fragment, { key: 0 }, [
          createBaseVNode("div", _hoisted_1$q, [
            createBaseVNode("label", _hoisted_2$h, toDisplayString(props.label), 1)
          ]),
          createBaseVNode("div", _hoisted_3$c, [
            renderSlot(_ctx.$slots, "default")
          ])
        ], 64)) : typeof props.label === "string" ? (openBlock(), createElementBlock(Fragment, { key: 1 }, [
          createBaseVNode("label", _hoisted_4$6, toDisplayString(props.label), 1),
          renderSlot(_ctx.$slots, "default")
        ], 64)) : renderSlot(_ctx.$slots, "default", { key: 2 })
      ], 2);
    };
  }
});
function setup$r(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    children: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    const _component_vControl = __unplugin_components_0$1;
    const _component_vField = _sfc_main$J;
    return openBlock(), createBlock(_component_vField, { addons: "" }, {
      default: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
          return openBlock(), createBlock(_component_vControl, { key: i }, {
            default: withCtx(() => [
              (openBlock(), createBlock(resolveDynamicComponent(item.component), {
                properties: item.props
              }, null, 8, ["properties"]))
            ]),
            _: 2
          }, 1024);
        }), 128))
      ]),
      _: 1
    });
  };
}
const __default__$r = {
  name: "gButtonGroup"
};
const _sfc_main$I = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$r), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$r
}));
function useViaPlaceholderError(event, size) {
  const target = event.target;
  target.src = `https://via.placeholder.com/${size}`;
}
const _hoisted_1$p = ["src"];
const _hoisted_2$g = ["src"];
const _hoisted_3$b = ["src"];
const _sfc_main$H = /* @__PURE__ */ defineComponent({
  props: {
    picture: { default: void 0 },
    pictureDark: { default: void 0 },
    placeholder: { default: "https://via.placeholder.com/50x50" },
    badge: { default: void 0 },
    initials: { default: "?" },
    size: { default: void 0 },
    color: { default: void 0 },
    dotColor: { default: void 0 },
    squared: { type: Boolean },
    dot: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["v-avatar", [
          __props.size && `is-${props.size}`,
          __props.dot && "has-dot",
          __props.dotColor && `dot-${props.dotColor}`,
          __props.squared && __props.dot && "has-dot-squared"
        ]])
      }, [
        renderSlot(_ctx.$slots, "avatar", {}, () => [
          props.picture ? (openBlock(), createElementBlock("img", {
            key: 0,
            class: normalizeClass(["avatar", [
              props.squared && "is-squared",
              props.pictureDark && "light-image"
            ]]),
            src: props.picture,
            alt: "",
            onErrorOnce: _cache[0] || (_cache[0] = (event) => unref(useViaPlaceholderError)(event, "150x150"))
          }, null, 42, _hoisted_1$p)) : (openBlock(), createElementBlock("span", {
            key: 1,
            class: normalizeClass(["avatar is-fake", [
              props.squared && "is-squared",
              props.color && `is-${props.color}`
            ]])
          }, [
            createBaseVNode("span", null, toDisplayString(props.initials), 1)
          ], 2)),
          props.picture && props.pictureDark ? (openBlock(), createElementBlock("img", {
            key: 2,
            class: normalizeClass(["avatar dark-image", [props.squared && "is-squared"]]),
            src: props.pictureDark,
            alt: "",
            onErrorOnce: _cache[1] || (_cache[1] = (event) => unref(useViaPlaceholderError)(event, "150x150"))
          }, null, 42, _hoisted_2$g)) : createCommentVNode("", true)
        ]),
        renderSlot(_ctx.$slots, "badge", {}, () => [
          props.badge ? (openBlock(), createElementBlock("img", {
            key: 0,
            class: "badge",
            src: props.badge,
            alt: "",
            onErrorOnce: _cache[2] || (_cache[2] = (event) => unref(useViaPlaceholderError)(event, "150x150"))
          }, null, 40, _hoisted_3$b)) : createCommentVNode("", true)
        ])
      ], 2);
    };
  }
});
function setup$q(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    picture: "",
    badge: "",
    initials: "",
    size: "",
    color: "",
    dot_color: "",
    squared: false,
    dot: false
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  function initials(text) {
    const names = text.split(" ");
    let init = names[0].substring(0, 1).toUpperCase();
    if (names.length > 1) {
      init += names[names.length - 1].substring(0, 1).toUpperCase();
    }
    return init;
  }
  return (_ctx, _cache) => {
    const _component_vAvatar = _sfc_main$H;
    return openBlock(), createBlock(_component_vAvatar, {
      picture: unref(config).picture,
      badge: unref(config).badge,
      initials: initials(unref(config).initials),
      size: unref(config).size,
      squared: unref(config).squared,
      "dot-color": unref(config).dot_color,
      dot: unref(config).dot,
      color: unref(config).color
    }, {
      default: withCtx(() => [
        createTextVNode(toDisplayString(unref(config).title), 1)
      ]),
      _: 1
    }, 8, ["picture", "badge", "initials", "size", "squared", "dot-color", "dot", "color"]);
  };
}
const __default__$q = {
  name: "gAvatar"
};
const _sfc_main$G = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$q), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$q
}));
const _hoisted_1$o = ["data-icon"];
const _sfc_main$F = /* @__PURE__ */ defineComponent({
  props: {
    icon: null
  },
  setup(__props) {
    const props = __props;
    const isIconify = computed(() => {
      return props.icon && props.icon.indexOf(":") !== -1;
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("span", {
        key: props.icon
      }, [
        unref(isIconify) ? (openBlock(), createElementBlock("i", {
          key: 0,
          "aria-hidden": "true",
          class: "iconify",
          "data-icon": props.icon
        }, null, 8, _hoisted_1$o)) : (openBlock(), createElementBlock("i", {
          key: 1,
          "aria-hidden": "true",
          class: normalizeClass(props.icon)
        }, null, 2))
      ]);
    };
  }
});
function useDropdown(container) {
  const isOpen = ref(false);
  onClickOutside(container, () => {
    isOpen.value = false;
  });
  const open = () => {
    isOpen.value = true;
  };
  const close = () => {
    isOpen.value = false;
  };
  const toggle = () => {
    isOpen.value = !isOpen.value;
  };
  watchEffect(() => {
    if (!container.value) {
      return;
    }
    if (isOpen.value) {
      container.value.classList.add("is-active");
    } else {
      container.value.classList.remove("is-active");
    }
  });
  return reactive({
    isOpen,
    open,
    close,
    toggle
  });
}
var VDropdown_vue_vue_type_style_index_0_scoped_true_lang = "";
const _hoisted_1$n = { key: 0 };
const _hoisted_2$f = {
  class: "dropdown-menu",
  role: "menu"
};
const _hoisted_3$a = { class: "dropdown-content" };
const _sfc_main$E = /* @__PURE__ */ defineComponent({
  props: {
    title: { default: void 0 },
    color: { default: void 0 },
    icon: { default: void 0 },
    up: { type: Boolean },
    right: { type: Boolean },
    modern: { type: Boolean },
    spaced: { type: Boolean }
  },
  setup(__props, { expose }) {
    const props = __props;
    const dropdownElement = ref();
    const dropdown = useDropdown(dropdownElement);
    expose(__spreadValues({}, dropdown));
    return (_ctx, _cache) => {
      const _component_VIcon = _sfc_main$F;
      return openBlock(), createElementBlock("div", {
        ref: (_value, _refs) => {
          _refs["dropdownElement"] = _value;
          dropdownElement.value = _value;
        },
        class: normalizeClass([[
          props.right && "is-right",
          props.up && "is-up",
          props.icon && "is-dots",
          props.modern && "is-modern",
          props.spaced && "is-spaced"
        ], "dropdown"])
      }, [
        renderSlot(_ctx.$slots, "button", normalizeProps(guardReactiveProps(unref(dropdown))), () => [
          props.icon ? (openBlock(), createElementBlock("a", {
            key: 0,
            class: "is-trigger dropdown-trigger",
            "aria-label": "View more actions",
            onClick: _cache[0] || (_cache[0] = (...args) => unref(dropdown).toggle && unref(dropdown).toggle(...args))
          }, [
            createVNode(_component_VIcon, {
              icon: props.icon
            }, null, 8, ["icon"])
          ])) : (openBlock(), createElementBlock("a", {
            key: 1,
            class: normalizeClass(["is-trigger button dropdown-trigger", [props.color && `is-${props.color}`]]),
            onClick: _cache[1] || (_cache[1] = (...args) => unref(dropdown).toggle && unref(dropdown).toggle(...args))
          }, [
            props.title ? (openBlock(), createElementBlock("span", _hoisted_1$n, toDisplayString(props.title), 1)) : createCommentVNode("", true),
            createBaseVNode("span", {
              class: normalizeClass([!props.modern && "base-caret", props.modern && "base-caret"])
            }, [
              !unref(dropdown).isOpen ? (openBlock(), createBlock(_component_VIcon, {
                key: 0,
                icon: "fa:angle-down"
              })) : (openBlock(), createBlock(_component_VIcon, {
                key: 1,
                icon: "fa:angle-up"
              }))
            ], 2)
          ], 2))
        ], true),
        createBaseVNode("div", _hoisted_2$f, [
          createBaseVNode("div", _hoisted_3$a, [
            renderSlot(_ctx.$slots, "content", normalizeProps(guardReactiveProps(unref(dropdown))), void 0, true)
          ])
        ])
      ], 2);
    };
  }
});
var __unplugin_components_0 = /* @__PURE__ */ _export_sfc(_sfc_main$E, [["__scopeId", "data-v-c593a1e0"]]);
function setup$p(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    title: "",
    icon: "",
    type: "",
    children: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  return (_ctx, _cache) => {
    const _component_VDropdown = __unplugin_components_0;
    return openBlock(), createBlock(_component_VDropdown, {
      icon: unref(config).icon,
      title: unref(config).title,
      color: unref(config).type,
      spaced: ""
    }, {
      content: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            key: i
          }, null, 8, ["properties"]);
        }), 128))
      ]),
      _: 1
    }, 8, ["icon", "title", "color"]);
  };
}
const __default__$p = {
  name: "gDropDown"
};
const _sfc_main$D = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$p), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$p
}));
const _hoisted_1$m = {
  key: 0,
  class: "icon"
};
const _hoisted_2$e = ["src"];
const _hoisted_3$9 = { class: "meta" };
function setup$o(__props) {
  const props = __props;
  const config = reactive({
    is_media: true,
    icon: "",
    image: "",
    meta: []
  });
  onMounted(() => {
    config.value = apply(props.properties, config, props.scope);
  });
  const classes = computed(() => {
    let classes2 = {
      "dropdown-item": true,
      "is-media": config.is_media
    };
    return classes2;
  });
  return (_ctx, _cache) => {
    return openBlock(), createElementBlock("a", {
      href: "#",
      class: normalizeClass(unref(classes))
    }, [
      unref(config).icon ? (openBlock(), createElementBlock("div", _hoisted_1$m, [
        createBaseVNode("i", {
          class: normalizeClass(unref(config).icon)
        }, null, 2)
      ])) : unref(config).image ? (openBlock(), createElementBlock("img", {
        key: 1,
        class: "item-img",
        src: unref(config).image,
        alt: ""
      }, null, 8, _hoisted_2$e)) : createCommentVNode("", true),
      createBaseVNode("div", _hoisted_3$9, [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).meta, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            key: i
          }, null, 8, ["properties"]);
        }), 128))
      ])
    ], 2);
  };
}
const __default__$o = {
  name: "gDropDownItem"
};
const _sfc_main$C = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$o), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$o
}));
function useScope(scope) {
  const process = (text) => {
    if (typeof text === "string") {
      Object.keys(scope).forEach((k) => {
        text = text.replace(`$${k}`, scope[k]);
      });
      return text;
    }
    if (typeof text === "object") {
      text = processObject(text);
    }
    return text;
  };
  const processObject = (prop) => {
    const text = JSON.parse(JSON.stringify(prop));
    Object.keys(text).forEach((k) => {
      if (text[k]) {
        text[k] = process(text[k]);
      }
    });
    return text;
  };
  return {
    process,
    processObject
  };
}
function setup$n(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    title: ""
  });
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  const { process } = useScope(props.scope);
  const text = computed(() => {
    return process(config.title);
  });
  return (_ctx, _cache) => {
    return openBlock(), createElementBlock("div", null, toDisplayString(unref(text)), 1);
  };
}
const __default__$n = {
  name: "gText"
};
const _sfc_main$B = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$n), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$n
}));
class Api {
  constructor(name, authorized = true, session = useUserSession()) {
    let server = "http://bet.whatsnew.gr";
    console.log(server);
    this.server = server;
    this.endpoint = `${name}`;
    this.headers = {};
    if (authorized) {
      axios.defaults.headers.common["authorization"] = "Bearer " + session.token.access;
    }
  }
  get(filters = {}, page = 1, url = "", other_domain = false) {
    let params = this.genParams(filters, page);
    if (!other_domain) {
      url = this.getUrl(url);
    }
    return axios({
      url: url + params,
      method: "get",
      headers: this.headers
    });
  }
  post(data = {}, filters = {}, url = "", other_domain = false) {
    let params = this.genParams(filters, 1);
    if (!other_domain) {
      url = this.getUrl(url);
    }
    return axios({
      url: url + params,
      data,
      method: "post",
      headers: this.headers
    });
  }
  upload(data = {}, url = "", other_domain = false) {
    if (!other_domain) {
      url = this.getUrl(url);
    }
    return axios.post(url, data, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    });
  }
  update(data = {}, id = "", filters = {}, url = "", other_domain = false) {
    let params = this.genParams(filters, 1);
    if (!other_domain) {
      url = this.getUrl(url) + `/${id}`;
    }
    data["_method"] = "PATCH";
    return axios.patch(url + params, data);
  }
  delete(id, url = "", other_domain = false) {
    let data = {
      _method: "DELETE"
    };
    if (!other_domain) {
      url = this.getUrl(url) + "/" + id;
    }
    return axios({
      url,
      data,
      method: "post",
      headers: this.headers
    });
  }
  getUrl(url, server = "") {
    if (!url) {
      return this.server + this.endpoint;
    }
    return this.server + url;
  }
  genParams(filters, page = null) {
    var get = "?";
    if (page) {
      get += `page=${page}&`;
    }
    Object.keys(filters).forEach((k) => {
      if (filters[k]) {
        get += k + "=" + filters[k] + "&";
      }
    });
    return get;
  }
}
class RestRepo {
  constructor(props, default_value = null) {
    __publicField(this, "api");
    this.api = new Api(props.url);
  }
  async get(params = {}) {
    return new Promise((resolve, reject) => {
      this.api.get(params).then((response) => {
        resolve(response.data);
      }).catch((err) => {
        reject(err);
      });
    });
  }
  set(value) {
  }
}
class StateRepo {
  constructor(props, default_value = null) {
    __publicField(this, "key");
    this.key = props.key;
    if (default_value) {
      this.set(default_value);
    }
  }
  set(value) {
    store.commit("components/bind", {
      key: this.key,
      value
    });
  }
  select(value, identifier) {
    store.commit("components/select", {
      key: this.key,
      identifier,
      value
    });
  }
  get() {
    let result = store.getters["components/data"];
    return _.get(result, this.key);
  }
}
class Repository {
  constructor(props, default_value = null) {
    if (props.name === "restRepo") {
      return new RestRepo(props, default_value);
    }
    if (props.name === "stateRepo") {
      return new StateRepo(props, default_value);
    }
  }
}
function useState() {
  const getData = (name) => {
    const state = new StateRepo({ key: name });
    return state.get();
  };
  const setData = (name, value) => {
    const state = new StateRepo({ key: name });
    return state.set(value);
  };
  const select = (name, identifier, value) => {
    const state = new StateRepo({ key: name });
    return state.select(value, identifier);
  };
  return {
    getData,
    setData,
    select
  };
}
function useApi() {
  const session = useUserSession();
  const get = (url, params = {}, authenticated = true) => {
    const get2 = genParams(params);
    return axios({
      url: `${url}${get2}`,
      method: "get",
      headers: getHeaders(authenticated)
    });
  };
  const post = (url, data, params = {}, authenticated = true) => {
    const get2 = genParams(params);
    return axios({
      url: `${url}${get2}`,
      data,
      method: "POST",
      headers: getHeaders(authenticated)
    });
  };
  const del = (url, data, params = {}, authenticated = true) => {
    const get2 = genParams(params);
    return axios({
      url: `${url}${get2}`,
      data,
      method: "delete",
      headers: getHeaders(authenticated)
    });
  };
  const update = (url, data, params = {}, authenticated = true) => {
    const get2 = genParams(params);
    data["_method"] = "PATCH";
    return axios({
      url: `${url}${get2}`,
      data,
      method: "post",
      headers: getHeaders(authenticated)
    });
  };
  const getHeaders = (authorized = true) => {
    const headers = {};
    if (authorized) {
      headers.authorization = `Bearer ${session.token.access}`;
    }
    return headers;
  };
  const genParams = (params, page = null) => {
    let get2 = "?";
    if (!params) {
      return get2;
    }
    if (page) {
      get2 += `page=${page}&`;
    }
    Object.keys(params).forEach((k) => {
      if (params[k]) {
        get2 += k + "=" + params[k] + "&";
      }
    });
    return get2;
  };
  return {
    get,
    post,
    del,
    update
  };
}
const _hoisted_1$l = {
  key: 0,
  class: "column"
};
const _hoisted_2$d = {
  key: 1,
  class: "column"
};
function setup$m(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const { get } = useApi();
  const config = reactive({
    name: "",
    repo: {},
    children: [],
    no_results: [],
    not_found: "No Results Found"
  });
  const state = reactive({
    repo: {
      filters: {}
    },
    items: {},
    meta: {},
    render: 1,
    loading: true
  });
  function initRepository() {
    state.repo = new Repository(config.repo);
    listenTopic({ key: config.name });
    getItems();
  }
  const { setData, getData } = useState();
  let { listen, action, listenTopic } = useEvents();
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  action("search", (value) => {
    changePage(1);
    getItems();
  });
  action("get", (value) => {
    getItems();
  });
  action("clear", (value) => {
    changePage(1);
    clearFilters();
    getItems();
  });
  function getItems() {
    state.loading = true;
    const page = getData(`${config.name}.meta.current_page`);
    let filters = getData(`${config.name}.query`);
    if (!filters) {
      filters = {};
    }
    Object.keys(config.repo.filters).forEach((k) => {
      filters[k] = config.repo.filters[k];
    });
    filters.page = page;
    get(config.repo.get, filters).then((res) => {
      state.items = res.data.data;
      state.meta = res.data.meta;
      setData(`${config.name}.meta`, state.meta);
      setData(`${config.name}.items`, state.items);
      state.render++;
      state.loading = false;
    });
  }
  function changePage(page) {
    setData(`${config.name}.meta.current_page`, page);
  }
  function clearFilters() {
    setData(`${config.name}.query`, {});
  }
  const state_items = computed({
    get() {
      if (config.repo.name === "stateRepo") {
        return getData(config.name);
      }
      return state.items;
    }
  });
  watch(config, (newVal, oldVal) => {
    initRepository();
  }, {
    immediate: false,
    deep: true
  });
  return (_ctx, _cache) => {
    const _component_VCardAdvanced = _sfc_main$P;
    return unref(state_items).length ? (openBlock(true), createElementBlock(Fragment, { key: 0 }, renderList(unref(state_items), (scope, index) => {
      return openBlock(), createElementBlock(Fragment, {
        key: `${unref(state).render}_${index}`
      }, [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ], 64);
    }), 128)) : (openBlock(), createElementBlock(Fragment, { key: 1 }, [
      unref(config).no_results.length === 0 ? (openBlock(), createElementBlock("div", _hoisted_1$l, [
        createVNode(_component_VCardAdvanced, null, {
          content: withCtx(() => [
            createTextVNode(toDisplayString(unref(config).not_found), 1)
          ]),
          _: 1
        })
      ])) : (openBlock(), createElementBlock("div", _hoisted_2$d, [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).no_results, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: _ctx.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]))
    ], 64));
  };
}
const __default__$m = {
  name: "gBuilder",
  inheritAttrs: false
};
const _sfc_main$A = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$m), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$m
}));
const _hoisted_1$k = { for: "" };
const _hoisted_2$c = ["onKeyup", "placeholder"];
const _hoisted_3$8 = { key: 1 };
function setup$l(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const state = reactive({
    repo: {},
    render: 1
  });
  const config = reactive({
    value: "test",
    title: "",
    name: "",
    rounded: false,
    focus: "",
    help: "",
    placeholder: "",
    disabled: false,
    error: false,
    icon: "",
    addons: [],
    on_change: [],
    repo: {
      key: ""
    },
    on_enter: []
  });
  const { publish } = useEvents();
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
  });
  function onEnter() {
    config.on_enter.forEach((event) => {
      return publish(event.action, event.payload, event.topic);
    });
  }
  function change(e) {
    config.on_change.forEach((event) => {
      return publish(event.action, event.payload, event.topic);
    });
  }
  watch(config, (newVal, oldVal) => {
    let def = _.get(props.scope, config.name);
    state.repo = new Repository(config.repo, def);
  }, {
    immediate: false,
    deep: true
  });
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return "";
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  const classes = computed(() => {
    let classes2 = {
      input: true,
      "is-rounded": config.rounded
    };
    const focus = `is-${config.focus}-focus`;
    classes2[focus] = true;
    return classes2;
  });
  return (_ctx, _cache) => {
    const _component_VControl = __unplugin_components_0$1;
    const _component_VField = _sfc_main$J;
    return openBlock(), createElementBlock("div", null, [
      createBaseVNode("label", _hoisted_1$k, toDisplayString(unref(config).title || unref(config).placeholder), 1),
      createVNode(_component_VField, {
        addons: unref(config).addons.length > 0
      }, {
        default: withCtx(() => [
          createVNode(_component_VControl, {
            expanded: unref(config).addons.length > 0,
            "has-error": unref(config).error === true,
            icon: unref(config).icon
          }, {
            default: withCtx(() => [
              !unref(config).disabled ? withDirectives((openBlock(), createElementBlock("input", {
                key: 0,
                onKeyup: withKeys(onEnter, ["enter"]),
                "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => isRef(value) ? value.value = $event : null),
                type: "text",
                class: normalizeClass(unref(classes)),
                placeholder: unref(config).placeholder,
                onChange: change
              }, null, 42, _hoisted_2$c)), [
                [vModelText, unref(value)]
              ]) : (openBlock(), createElementBlock("div", _hoisted_3$8, toDisplayString(unref(value)), 1))
            ]),
            _: 1
          }, 8, ["expanded", "has-error", "icon"]),
          unref(config).addons.length > 0 ? (openBlock(), createBlock(_component_VControl, { key: 0 }, {
            default: withCtx(() => [
              (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).addons, (item, i) => {
                return openBlock(), createBlock(resolveDynamicComponent(item.component), {
                  properties: item.props,
                  scope: __props.scope,
                  key: i
                }, null, 8, ["properties", "scope"]);
              }), 128))
            ]),
            _: 1
          })) : createCommentVNode("", true)
        ]),
        _: 1
      }, 8, ["addons"])
    ]);
  };
}
const __default__$l = {
  name: "gInput"
};
const _sfc_main$z = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$l), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$l
}));
const _sfc_main$y = /* @__PURE__ */ defineComponent({
  props: {
    size: { default: void 0 },
    card: { default: void 0 },
    active: { type: Boolean },
    grey: { type: Boolean },
    translucent: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["has-loader", [props.active && "has-loader-active"]])
      }, [
        props.active ? (openBlock(), createElementBlock("div", {
          key: 0,
          class: normalizeClass(["v-loader-wrapper is-active", [
            __props.grey && "is-grey",
            __props.translucent && "is-translucent",
            __props.card === "regular" && "s-card",
            __props.card === "smooth" && "r-card",
            __props.card === "rounded" && "l-card"
          ]])
        }, [
          createBaseVNode("div", {
            class: normalizeClass(["loader is-loading", [props.size && `is-${props.size}`]])
          }, null, 2)
        ], 2)) : createCommentVNode("", true),
        renderSlot(_ctx.$slots, "default")
      ], 2);
    };
  }
});
function setup$k(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    repo: {
      get: "",
      post: "",
      patch: "",
      delete: ""
    },
    name: "",
    events: {
      name: "stateRepo",
      key: ""
    },
    children: [],
    data: [],
    on_created: [],
    on_updated: [],
    on_deleted: []
  });
  const state = reactive({
    repo: {},
    items: {},
    events: {},
    scope: {},
    loading: true
  });
  function initRepository() {
    state.repo = new Repository(config.repo);
  }
  let { publish, listen, action, listenTopic } = useEvents();
  onMounted(() => {
    state.scope = props.properties.data;
    if (Object.keys(props.properties.data).length === 0) {
      state.scope = props.scope;
    }
    config.value = apply2(props.properties, config, state.scope);
    listenTopic(config.events);
    setData(`${config.name}.body`, config.data);
    state.loading = false;
  });
  onUnmounted(() => {
    setData(`${config.name}`, {});
  });
  const { post, update, get, del } = useApi();
  const { getData, setData } = useState();
  const notyf2 = new Notyf({
    duration: 3e3
  });
  function publishEvents(events) {
    events.forEach((event) => {
      return publish(event.action, event.payload, event.topic);
    });
  }
  function syncScope(entry) {
    config.data = entry;
    config.value = apply2(props.properties, config, config.data);
  }
  function refresh() {
    state.loading = true;
    get(config.repo.get).then((response) => {
      setData(`${config.name}.body`, response.data);
    }).then((response) => {
      state.loading = false;
    });
  }
  action("refresh", (value) => {
    refresh();
  });
  action("show", (value) => {
    state.loading = true;
    get(config.repo.show).then((response) => {
      setData(`${config.name}.body`, response.data);
    }).then((response) => {
      state.loading = false;
    });
  });
  action("create", (value) => {
    state.loading = true;
    const data = getData(`${config.name}.body`);
    post(config.repo.post, data).then((response) => {
      state.loading = false;
      notyf2.success(response.data.message);
      syncScope(response.data.entry);
      publishEvents(config.on_created);
    }).catch((err) => {
      state.loading = false;
      const message = err.response.data.message;
      notyf2.error(message ? message : "Error on Create");
    });
  });
  action("update", (value) => {
    state.loading = true;
    const data = getData(`${config.name}.body`);
    update(config.repo.patch, data).then((response) => {
      state.loading = false;
      setData(`${config.name}.body`, response.data.body);
      notyf2.success(response.data.message);
      publishEvents(config.on_updated);
    }).catch((err) => {
      state.loading = false;
      const message = err.response.data.message;
      notyf2.error(message ? message : "Error on Create");
    });
  });
  action("delete", (value) => {
    del(config.repo.delete).then((response) => {
      state.loading = false;
      notyf2.success(response.data.message);
      publishEvents(config.on_deleted);
    }).catch((err) => {
      state.loading = false;
      const message = err.response.data.message;
      notyf2.error(message ? message : "Error on Create");
    });
  });
  watch(config, (newVal, oldVal) => {
    initRepository();
  }, {
    immediate: false,
    deep: true
  });
  return (_ctx, _cache) => {
    const _component_VLoader = _sfc_main$y;
    return openBlock(), createElementBlock("div", null, [
      createVNode(_component_VLoader, {
        translucent: true,
        size: "large",
        active: unref(state).loading
      }, {
        default: withCtx(() => [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              properties: item.props,
              scope: Object.keys(unref(state).scope).length > 0 ? unref(state).scope : __props.scope,
              key: i
            }, null, 8, ["properties", "scope"]);
          }), 128))
        ]),
        _: 1
      }, 8, ["active"])
    ]);
  };
}
const __default__$k = {
  name: "gForm",
  inheritAttrs: false
};
const _sfc_main$x = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$k), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return null;
      }
    }
  },
  setup: setup$k
}));
function block0$1(Component) {
  Component.__i18n = Component.__i18n || [];
  Component.__i18n.push({
    "locale": "",
    "resource": {
      "de": {
        "goto-page-title": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Gehe zu Seite ", _interpolate(_named("page"))]);
        }
      },
      "en": {
        "goto-page-title": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Goto page ", _interpolate(_named("page"))]);
        }
      },
      "es-MX": {
        "goto-page-title": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Ir a la p\xE1gina ", _interpolate(_named("page"))]);
        }
      },
      "es": {
        "goto-page-title": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Ir a la p\xE1gina ", _interpolate(_named("page"))]);
        }
      },
      "fr": {
        "goto-page-title": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["Aller \xE0 la page ", _interpolate(_named("page"))]);
        }
      },
      "zh-CN": {
        "goto-page-title": (ctx) => {
          const { normalize: _normalize, interpolate: _interpolate, named: _named } = ctx;
          return _normalize(["\u8F6C\u5230\u7B2C", _interpolate(_named("page")), "\u9875"]);
        }
      }
    }
  });
}
const _hoisted_1$j = {
  role: "navigation",
  class: "flex-pagination pagination is-rounded",
  "aria-label": "pagination",
  "data-filter-hide": ""
};
const _hoisted_2$b = /* @__PURE__ */ createBaseVNode("i", {
  "aria-hidden": "true",
  class: "iconify",
  "data-icon": "feather:chevron-left"
}, null, -1);
const _hoisted_3$7 = [
  _hoisted_2$b
];
const _hoisted_4$5 = /* @__PURE__ */ createBaseVNode("i", {
  "aria-hidden": "true",
  class: "iconify",
  "data-icon": "feather:chevron-right"
}, null, -1);
const _hoisted_5$3 = [
  _hoisted_4$5
];
const _hoisted_6$2 = { class: "pagination-list" };
const _hoisted_7$1 = ["aria-label"];
const _hoisted_8$1 = { key: 0 };
const _hoisted_9$1 = /* @__PURE__ */ createBaseVNode("span", { class: "pagination-ellipsis" }, "\u2026", -1);
const _hoisted_10$1 = [
  _hoisted_9$1
];
const _hoisted_11$1 = ["onClick"];
const _hoisted_12$1 = { key: 1 };
const _hoisted_13$1 = /* @__PURE__ */ createBaseVNode("span", { class: "pagination-ellipsis" }, "\u2026", -1);
const _hoisted_14$1 = [
  _hoisted_13$1
];
const _sfc_main$w = /* @__PURE__ */ defineComponent({
  props: {
    itemPerPage: null,
    totalItems: { default: 0 },
    currentPage: { default: 1 },
    maxLinksDisplayed: { default: 4 }
  },
  emits: ["change"],
  setup(__props, { emit }) {
    const props = __props;
    const { t } = useI18n();
    useRoute();
    const lastPage = computed(() => Math.ceil(props.totalItems / props.itemPerPage) || 1);
    const totalPageDisplayed = computed(() => lastPage.value > props.maxLinksDisplayed - 2 ? props.maxLinksDisplayed - 2 : lastPage.value);
    const pages = computed(() => {
      const _pages = [];
      let firstButton = props.currentPage - Math.floor(totalPageDisplayed.value / 2);
      let lastButton = firstButton + (totalPageDisplayed.value - Math.ceil(totalPageDisplayed.value % 2));
      if (firstButton < 1) {
        firstButton = 1;
        lastButton = firstButton + (totalPageDisplayed.value - 1);
      }
      if (lastButton > lastPage.value) {
        lastButton = lastPage.value;
        firstButton = lastButton - (totalPageDisplayed.value - 1);
      }
      for (let page = firstButton; page <= lastButton; page += 1) {
        if (page === firstButton || page === lastButton) {
          continue;
        }
        _pages.push(page);
      }
      return _pages;
    });
    computed(() => pages.value[0] > 1);
    computed(() => pages.value[pages.value.length - 1] < lastPage.value);
    function changePage(page) {
      if (page <= lastPage.value && page > 0) {
        emit("change", page);
      }
    }
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("nav", _hoisted_1$j, [
        unref(lastPage) > 1 ? (openBlock(), createElementBlock("div", {
          key: 0,
          onClick: _cache[0] || (_cache[0] = ($event) => changePage(__props.currentPage - 1)),
          class: "pagination-previous has-chevron"
        }, _hoisted_3$7)) : createCommentVNode("", true),
        unref(lastPage) > 1 ? (openBlock(), createElementBlock("div", {
          key: 1,
          onClick: _cache[1] || (_cache[1] = ($event) => changePage(__props.currentPage + 1)),
          class: "pagination-next has-chevron"
        }, _hoisted_5$3)) : createCommentVNode("", true),
        createBaseVNode("ul", _hoisted_6$2, [
          createBaseVNode("li", null, [
            createBaseVNode("div", {
              onClick: _cache[2] || (_cache[2] = ($event) => changePage(1)),
              class: normalizeClass(["pagination-link", [__props.currentPage === 1 && "is-current"]]),
              "aria-label": unref(t)("goto-page-title", { page: 1 })
            }, " 1 ", 10, _hoisted_7$1)
          ]),
          unref(pages).length === 0 || unref(pages)[0] > 2 ? (openBlock(), createElementBlock("li", _hoisted_8$1, _hoisted_10$1)) : createCommentVNode("", true),
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(pages), (page) => {
            return openBlock(), createElementBlock("li", { key: page }, [
              createBaseVNode("div", {
                class: normalizeClass([[__props.currentPage === page && "is-current"], "pagination-link"]),
                onClick: ($event) => changePage(page)
              }, toDisplayString(page), 11, _hoisted_11$1)
            ]);
          }), 128)),
          unref(pages)[unref(pages).length - 1] < unref(lastPage) - 1 ? (openBlock(), createElementBlock("li", _hoisted_12$1, _hoisted_14$1)) : createCommentVNode("", true),
          createBaseVNode("li", null, [
            createBaseVNode("div", {
              onClick: _cache[3] || (_cache[3] = ($event) => changePage(unref(lastPage))),
              class: normalizeClass(["pagination-link", [__props.currentPage === unref(lastPage) && "is-current"]])
            }, toDisplayString(unref(lastPage)), 3)
          ])
        ])
      ]);
    };
  }
});
if (typeof block0$1 === "function")
  block0$1(_sfc_main$w);
function setup$j(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    name: "",
    on_change: [],
    events: {
      name: "stateRepo",
      key: ""
    }
  });
  const { getData, setData } = useState();
  const { publish } = useEvents(config.events);
  const meta = reactive({
    current_page: 1,
    per_page: 1,
    total: 1
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  function publishEvents() {
    config.on_change.forEach((event) => {
      return publish(event.action, event.payload, event.topic);
    });
  }
  function changePage(page) {
    meta.current_page = page;
    setData(`${config.name}.current_page`, page);
    publishEvents();
  }
  const value = computed({
    get() {
      return getData(config.name);
    }
  });
  watch(value, (newVal, oldVal) => {
    if (newVal) {
      meta.total = newVal.total;
      meta.current_page = newVal.current_page;
      meta.per_page = newVal.per_page;
    }
  }, {
    immediate: false,
    deep: true
  });
  return (_ctx, _cache) => {
    const _component_VFlexPagination = _sfc_main$w;
    return unref(meta).per_page < unref(meta).total ? (openBlock(), createBlock(_component_VFlexPagination, {
      key: 0,
      onChange: changePage,
      "item-per-page": Number(unref(meta).per_page),
      "total-items": unref(meta).total,
      "current-page": unref(meta).current_page,
      "max-links-displayed": 5
    }, null, 8, ["item-per-page", "total-items", "current-page"])) : createCommentVNode("", true);
  };
}
const __default__$j = {
  name: "gPagination"
};
const _sfc_main$v = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$j), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$j
}));
function block0(Component) {
  Component.__i18n = Component.__i18n || [];
  Component.__i18n.push({
    "locale": "",
    "resource": {
      "de": {
        "cancel-label": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Abbrechen"]);
        }
      },
      "en": {
        "cancel-label": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Cancel"]);
        }
      },
      "es-MX": {
        "cancel-label": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Cancelar"]);
        }
      },
      "es": {
        "cancel-label": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Cancelar"]);
        }
      },
      "fr": {
        "cancel-label": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["Annuler"]);
        }
      },
      "zh-CN": {
        "cancel-label": (ctx) => {
          const { normalize: _normalize } = ctx;
          return _normalize(["\u53D6\u6D88"]);
        }
      }
    }
  });
}
const _hoisted_1$i = { class: "modal-content" };
const _hoisted_2$a = { class: "modal-card" };
const _hoisted_3$6 = { class: "modal-card-head" };
const _hoisted_4$4 = /* @__PURE__ */ createBaseVNode("i", {
  "aria-hidden": "true",
  class: "iconify",
  "data-icon": "feather:x"
}, null, -1);
const _hoisted_5$2 = [
  _hoisted_4$4
];
const _hoisted_6$1 = { class: "inner-content" };
const _sfc_main$u = /* @__PURE__ */ defineComponent({
  props: {
    title: null,
    size: { default: void 0 },
    actions: { default: void 0 },
    open: { type: Boolean },
    rounded: { type: Boolean },
    noscroll: { type: Boolean },
    noclose: { type: Boolean },
    tabs: { type: Boolean },
    cancelLabel: { default: void 0 }
  },
  emits: ["close"],
  setup(__props, { emit }) {
    const props = __props;
    const { t } = useI18n();
    const wasOpen = ref(false);
    const cancelLabel = computed(() => props.cancelLabel || t("cancel-label"));
    const checkScroll = () => {
      if (props.noscroll && props.open) {
        document.documentElement.classList.add("no-scroll");
        wasOpen.value = true;
      } else if (wasOpen.value && props.noscroll && !props.open) {
        document.documentElement.classList.remove("no-scroll");
        wasOpen.value = false;
      }
    };
    watchEffect(checkScroll);
    onUnmounted(() => {
      document.documentElement.classList.remove("no-scroll");
    });
    return (_ctx, _cache) => {
      return openBlock(), createBlock(Teleport, { to: "body" }, [
        createBaseVNode("div", {
          class: normalizeClass([[__props.open && "is-active", __props.size && `is-${__props.size}`], "modal v-modal"])
        }, [
          createBaseVNode("div", {
            class: "modal-background v-modal-close",
            onClick: _cache[0] || (_cache[0] = () => __props.noclose === false && emit("close"))
          }),
          createBaseVNode("div", _hoisted_1$i, [
            createBaseVNode("div", _hoisted_2$a, [
              createBaseVNode("header", _hoisted_3$6, [
                createBaseVNode("h3", null, toDisplayString(__props.title), 1),
                createBaseVNode("button", {
                  class: "v-modal-close ml-auto",
                  "aria-label": "close",
                  onClick: _cache[1] || (_cache[1] = ($event) => emit("close"))
                }, _hoisted_5$2)
              ]),
              createBaseVNode("div", {
                class: normalizeClass(["modal-card-body", [props.tabs && "has-tabs"]])
              }, [
                createBaseVNode("div", _hoisted_6$1, [
                  renderSlot(_ctx.$slots, "content")
                ])
              ], 2),
              createBaseVNode("div", {
                class: normalizeClass(["modal-card-foot", [
                  __props.actions === "center" && "is-centered",
                  __props.actions === "right" && "is-end"
                ]])
              }, [
                renderSlot(_ctx.$slots, "cancel", {}, () => [
                  createBaseVNode("a", {
                    class: normalizeClass(["button v-button v-modal-close", [__props.rounded && "is-rounded"]]),
                    onClick: _cache[2] || (_cache[2] = ($event) => emit("close"))
                  }, toDisplayString(unref(cancelLabel)), 3)
                ]),
                renderSlot(_ctx.$slots, "action")
              ], 2)
            ])
          ])
        ], 2)
      ]);
    };
  }
});
if (typeof block0 === "function")
  block0(_sfc_main$u);
function setup$i(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    name: "",
    title: "",
    size: "medium",
    rounded: true,
    children: [],
    footer: [],
    actions: "right"
  });
  const state = reactive({
    modal: false
  });
  const { listenTopic, listen, action } = useEvents();
  onMounted(() => {
    config.value = apply2(props.properties, config, props.scope);
    listenTopic({ key: config.name });
  });
  action("show", () => {
    show();
  });
  function show() {
    state.modal = true;
  }
  action("close", () => {
    close();
  });
  function close() {
    state.modal = false;
  }
  return (_ctx, _cache) => {
    const _component_VModal = _sfc_main$u;
    return openBlock(), createElementBlock("div", null, [
      createVNode(_component_VModal, {
        title: unref(config).title,
        open: unref(state).modal,
        size: unref(config).size,
        rounded: unref(config).rounded,
        actions: unref(config).actions,
        onClose: close
      }, createSlots({ _: 2 }, [
        unref(state).modal ? {
          name: "content",
          fn: withCtx(() => [
            (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
              return openBlock(), createBlock(resolveDynamicComponent(item.component), {
                properties: item.props,
                scope: __props.scope,
                key: i
              }, null, 8, ["properties", "scope"]);
            }), 128))
          ])
        } : void 0,
        unref(state).modal ? {
          name: "action",
          fn: withCtx(() => [
            (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).footer, (item, i) => {
              return openBlock(), createBlock(resolveDynamicComponent(item.component), {
                properties: item.props,
                scope: __props.scope,
                key: i
              }, null, 8, ["properties", "scope"]);
            }), 128))
          ])
        } : void 0
      ]), 1032, ["title", "open", "size", "rounded", "actions"])
    ]);
  };
}
const __default__$i = {
  name: "gModal"
};
const _sfc_main$t = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$i), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$i
}));
const _hoisted_1$h = { style: { "min-height": "200px" } };
function setup$h(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const { get } = useApi();
  const { getData, setData } = useState();
  const config = reactive({
    name: "",
    topic: ""
  });
  const state = reactive({
    loading: true,
    render: 1
  });
  let { publish, listen, action, listenTopic } = useEvents();
  onMounted(() => {
    config.value = apply2(props.properties, config);
    listenTopic({ key: config.topic });
    getPage();
  });
  function getPage() {
    state.loading = true;
    let filters = getData(config.name);
    if (!filters) {
      filters = {};
    }
    Object.keys(config.repo.filters).forEach((k) => {
      filters[k] = config.repo.filters[k];
    });
    get(config.repo.get, filters).then((res) => {
      config.children = res.data.props.children;
      state.loading = false;
      state.render += 1;
    });
  }
  action("get", (value) => {
    getPage();
  });
  action("alert", (value) => {
    alert("test");
  });
  return (_ctx, _cache) => {
    const _component_VLoader = _sfc_main$y;
    return openBlock(), createBlock(_component_VLoader, {
      translucent: true,
      size: "large",
      active: unref(state).loading
    }, {
      default: withCtx(() => [
        createBaseVNode("div", _hoisted_1$h, [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
            return openBlock(), createBlock(resolveDynamicComponent(item.component), {
              properties: item.props,
              scope: __props.scope,
              key: unref(state).render
            }, null, 8, ["properties", "scope"]);
          }), 128))
        ])
      ]),
      _: 1
    }, 8, ["active"]);
  };
}
const __default__$h = {
  name: "gView"
};
const _sfc_main$s = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$h), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$h
}));
const _sfc_main$r = /* @__PURE__ */ defineComponent({
  props: {
    compact: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["flex-table", [props.compact && "is-compact"]])
      }, [
        renderSlot(_ctx.$slots, "header"),
        renderSlot(_ctx.$slots, "body")
      ], 2);
    };
  }
});
const _hoisted_1$g = { class: "flex-table-header" };
function setup$g(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  useApi();
  const config = reactive({
    children: [],
    builder: {
      children: []
    }
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    const _component_VFlexTable = _sfc_main$r;
    return openBlock(), createBlock(_component_VFlexTable, { style: { "margin-top": "10px" } }, {
      header: withCtx(() => [
        createBaseVNode("div", _hoisted_1$g, [
          (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).columns, (column) => {
            return openBlock(), createElementBlock("span", {
              class: normalizeClass({ "cell-end": column.props.end })
            }, toDisplayString(column.props.title), 3);
          }), 256))
        ])
      ]),
      body: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: __props.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]),
      _: 1
    });
  };
}
const __default__$g = {
  name: "gTable"
};
const _sfc_main$q = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$g), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$g
}));
const _hoisted_1$f = { class: "flex-table-item" };
function setup$f(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  useApi();
  const config = reactive({
    title: "",
    end: false,
    columns: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    return openBlock(), createElementBlock("div", _hoisted_1$f, [
      (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).columns, (item, i) => {
        return openBlock(), createBlock(resolveDynamicComponent(item.component), {
          properties: item.props,
          scope: __props.scope,
          key: i
        }, null, 8, ["properties", "scope"]);
      }), 128))
    ]);
  };
}
const __default__$f = {
  name: "gTableRow"
};
const _sfc_main$p = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$f), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$f
}));
const _hoisted_1$e = ["data-th"];
function setup$e(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  useApi();
  const config = reactive({
    title: "",
    end: false,
    children: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    return openBlock(), createElementBlock("div", {
      class: normalizeClass({ "flex-table-cell": true, "is-bold": true, "cell-end": unref(config).end }),
      "data-th": unref(config).title
    }, [
      (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).children, (item, i) => {
        return openBlock(), createBlock(resolveDynamicComponent(item.component), {
          properties: item.props,
          scope: __props.scope,
          key: i
        }, null, 8, ["properties", "scope"]);
      }), 128))
    ], 10, _hoisted_1$e);
  };
}
const __default__$e = {
  name: "gTableColumn"
};
const _sfc_main$o = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$e), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$e
}));
var Selectable_vue_vue_type_style_index_0_scoped_true_lang = "";
const _hoisted_1$d = { class: "title is-5 mb-2" };
const _hoisted_2$9 = { class: "is-bold" };
function setup$d(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    identifier: "id",
    label: "title",
    subtitle: "subtitle",
    name: "",
    options: []
  });
  const { process } = useScope(props.scope);
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  const { select: selectItem, getData } = useState();
  function select(item) {
    selectItem(process(config.name), config.identifier, process(item));
  }
  function isSelected(option) {
    if (typeof selected.value === "undefined") {
      return false;
    }
    const index = selected.value.findIndex((el) => {
      return el[config.identifier] === process(option[config.identifier]);
    });
    return index > -1;
  }
  const selected = computed({
    get() {
      return getData(config.name);
    }
  });
  return (_ctx, _cache) => {
    const _component_VCard = _sfc_main$V;
    const _component_vFlexItem = _sfc_main$R;
    const _component_vFlex = _sfc_main$T;
    return openBlock(), createBlock(_component_vFlex, {
      "column-gap": "10px",
      "flex-wrap": "wrap",
      "justify-content": "space-evenly",
      style: { "width": "100%" }
    }, {
      default: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).options, (option, i) => {
          return openBlock(), createBlock(_component_vFlexItem, {
            "flex-grow": 1,
            onClick: ($event) => select(option),
            key: i
          }, {
            default: withCtx(() => [
              createVNode(_component_VCard, {
                radius: "small",
                color: isSelected(option) ? "success" : "primary"
              }, {
                default: withCtx(() => [
                  createBaseVNode("h3", _hoisted_1$d, toDisplayString(option[unref(config).label]), 1),
                  createBaseVNode("p", _hoisted_2$9, toDisplayString(unref(process)(option.subtitle)), 1)
                ]),
                _: 2
              }, 1032, ["color"])
            ]),
            _: 2
          }, 1032, ["onClick"]);
        }), 128))
      ]),
      _: 1
    });
  };
}
const __default__$d = {
  name: "gSelectable"
};
const _sfc_main$n = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$d), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$d
}));
var Selectable = /* @__PURE__ */ _export_sfc(_sfc_main$n, [["__scopeId", "data-v-3e614949"]]);
function setup$c(__props) {
  const { listen, clearAll, listenTopic, action } = useEvents();
  const router = useRouter();
  const config = reactive({
    name: "route"
  });
  onMounted(() => {
    listenTopic({ key: config.name });
  });
  action("push", (value) => {
    clearAll();
    router.push(value);
  });
  action("back", (value) => {
    clearAll();
    router.back();
  });
  return (_ctx, _cache) => {
    return null;
  };
}
const __default__$c = {
  name: "gRoute"
};
const _sfc_main$m = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$c), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$c
}));
function setup$b(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const state = reactive({
    repo: {},
    render: 1
  });
  const config = reactive({
    name: "",
    label: "",
    labelProp: "title",
    valueProp: "id",
    multiple: true,
    repo: {
      name: "stateRepo",
      key: ""
    },
    options: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  watch(config, (newVal, oldVal) => {
    let def = _.get(props.scope, config.name);
    state.repo = new StateRepo({ key: config.name }, def);
  }, {
    immediate: false,
    deep: true
  });
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return [];
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  return (_ctx, _cache) => {
    const _component_Multiselect = resolveComponent("Multiselect");
    const _component_VControl = __unplugin_components_0$1;
    const _component_VField = _sfc_main$J;
    return openBlock(), createBlock(_component_VField, { class: "is-autocomplete-select" }, {
      default: withCtx(() => [
        createVNode(_component_VControl, { icon: "feather:search" }, {
          default: withCtx(() => [
            createVNode(_component_Multiselect, {
              modelValue: unref(value),
              "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => isRef(value) ? value.value = $event : null),
              options: unref(config).options,
              mode: unref(config).multiple ? "tags" : "single",
              searchable: true,
              "create-tag": false,
              valueProp: unref(config).valueProp,
              label: unref(config).labelProp,
              placeholder: unref(config).label
            }, null, 8, ["modelValue", "options", "mode", "valueProp", "label", "placeholder"])
          ]),
          _: 1
        })
      ]),
      _: 1
    });
  };
}
const __default__$b = {
  name: "gSelect"
};
const _sfc_main$l = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$b), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$b
}));
const _hoisted_1$c = { class: "tabs-inner" };
const _hoisted_2$8 = ["onClick"];
const _hoisted_3$5 = {
  key: 0,
  class: "tab-naver"
};
const _hoisted_4$3 = { class: "tab-content is-active" };
const _sfc_main$k = /* @__PURE__ */ defineComponent({
  props: {
    tabs: null,
    selected: { default: void 0 },
    type: { default: void 0 },
    align: { default: void 0 },
    slider: { type: Boolean },
    slow: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    const activeValue = ref(props.selected);
    const sliderClass = computed(() => {
      if (!props.slider) {
        return "";
      }
      if (props.type === "rounded") {
        if (props.tabs.length === 3) {
          return "is-triple-slider";
        }
        if (props.tabs.length === 2) {
          return "is-slider";
        }
        return "";
      }
      if (!props.type) {
        if (props.tabs.length === 3) {
          return "is-squared is-triple-slider";
        }
        if (props.tabs.length === 2) {
          return "is-squared is-slider";
        }
      }
      return "";
    });
    return (_ctx, _cache) => {
      const _component_VIcon = _sfc_main$F;
      return openBlock(), createElementBlock("div", {
        class: normalizeClass(["tabs-wrapper", [unref(sliderClass)]])
      }, [
        createBaseVNode("div", _hoisted_1$c, [
          createBaseVNode("div", {
            class: normalizeClass(["tabs", [
              props.align === "centered" && "is-centered",
              props.align === "right" && "is-right",
              props.type === "rounded" && !props.slider && "is-toggle is-toggle-rounded",
              props.type === "toggle" && "is-toggle",
              props.type === "boxed" && "is-boxed"
            ]])
          }, [
            createBaseVNode("ul", null, [
              (openBlock(true), createElementBlock(Fragment, null, renderList(__props.tabs, (tab, key) => {
                return openBlock(), createElementBlock("li", {
                  key,
                  class: normalizeClass([activeValue.value === tab.value && "is-active"])
                }, [
                  createBaseVNode("a", {
                    onClick: ($event) => activeValue.value = tab.value
                  }, [
                    tab.icon ? (openBlock(), createBlock(_component_VIcon, {
                      key: 0,
                      icon: tab.icon
                    }, null, 8, ["icon"])) : createCommentVNode("", true),
                    createBaseVNode("span", null, toDisplayString(tab.label), 1)
                  ], 8, _hoisted_2$8)
                ], 2);
              }), 128)),
              unref(sliderClass) ? (openBlock(), createElementBlock("li", _hoisted_3$5)) : createCommentVNode("", true)
            ])
          ], 2)
        ]),
        createBaseVNode("div", _hoisted_4$3, [
          createVNode(TransitionGroup, {
            name: props.slow ? "fade-slow" : "fade-fast",
            mode: "out-in"
          }, {
            default: withCtx(() => [
              renderSlot(_ctx.$slots, "tab", { activeValue: activeValue.value })
            ]),
            _: 3
          }, 8, ["name"])
        ])
      ], 2);
    };
  }
});
const _hoisted_1$b = { key: 0 };
function setup$a(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    active: "",
    type: "",
    tabs: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    const _component_VTabs = _sfc_main$k;
    return unref(config).active ? (openBlock(), createBlock(_component_VTabs, {
      key: 0,
      type: unref(config).type,
      align: unref(config).align,
      tabs: unref(config).tabs,
      selected: unref(config).active
    }, {
      tab: withCtx(({ activeValue, tabs }) => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).tabs, (tab, i) => {
          return openBlock(), createElementBlock("div", { key: i }, [
            createVNode(Transition, {
              name: props.slow ? "fade-slow" : "fade-fast",
              mode: "out-in"
            }, {
              default: withCtx(() => [
                activeValue === tab.value ? (openBlock(), createElementBlock("div", _hoisted_1$b, [
                  (openBlock(true), createElementBlock(Fragment, null, renderList(tab.props.children, (item, i2) => {
                    return openBlock(), createBlock(resolveDynamicComponent(item.component), {
                      properties: item.props,
                      scope: __props.scope,
                      key: i2
                    }, null, 8, ["properties", "scope"]);
                  }), 128))
                ])) : createCommentVNode("", true)
              ]),
              _: 2
            }, 1032, ["name"])
          ]);
        }), 128))
      ]),
      _: 1
    }, 8, ["type", "align", "tabs", "selected"])) : createCommentVNode("", true);
  };
}
const __default__$a = {
  name: "gTabs"
};
const _sfc_main$j = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$a), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$a
}));
const _hoisted_1$a = ["aria-current"];
const _hoisted_2$7 = ["data-icon"];
const _hoisted_3$4 = ["content"];
const _hoisted_4$2 = {
  key: 2,
  itemprop: "name"
};
const _hoisted_5$1 = ["content"];
const _hoisted_6 = ["href"];
const _hoisted_7 = ["data-icon"];
const _hoisted_8 = ["content"];
const _hoisted_9 = {
  key: 2,
  itemprop: "name"
};
const _hoisted_10 = ["content"];
const _hoisted_11 = {
  key: 2,
  class: "breadcrumb-item"
};
const _hoisted_12 = ["data-icon"];
const _hoisted_13 = ["content"];
const _hoisted_14 = {
  key: 2,
  itemprop: "name"
};
const _hoisted_15 = ["content"];
const _sfc_main$i = /* @__PURE__ */ defineComponent({
  props: {
    items: null,
    separator: { default: void 0 },
    align: { default: void 0 },
    withIcons: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      const _component_RouterLink = resolveComponent("RouterLink");
      return openBlock(), createElementBlock("nav", {
        role: "navigation",
        class: normalizeClass(["breadcrumb", [
          `has-${props.separator}-separator`,
          props.align && `is-${props.align}`
        ]]),
        "aria-label": "breadcrumbs",
        itemscope: "",
        itemtype: "https://schema.org/BreadcrumbList"
      }, [
        createBaseVNode("ul", null, [
          (openBlock(true), createElementBlock(Fragment, null, renderList(props.items, (item, key) => {
            return openBlock(), createElementBlock("li", {
              key,
              "aria-current": key === __props.items.length - 1 ? "page" : void 0,
              itemprop: "itemListElement",
              itemscope: "",
              itemtype: "https://schema.org/ListItem"
            }, [
              item.to ? (openBlock(), createBlock(_component_RouterLink, {
                key: 0,
                class: "breadcrumb-item",
                itemprop: "item",
                to: item.to
              }, {
                default: withCtx(() => [
                  props.withIcons && !!item.icon ? (openBlock(), createElementBlock("span", {
                    key: 0,
                    class: normalizeClass(["icon is-small", [
                      item.hideLabel && props.withIcons && !!item.icon && "is-solo"
                    ]])
                  }, [
                    createBaseVNode("i", {
                      "aria-hidden": "true",
                      class: "iconify",
                      "data-icon": item.icon
                    }, null, 8, _hoisted_2$7)
                  ], 2)) : createCommentVNode("", true),
                  item.hideLabel && props.withIcons && !!item.icon ? (openBlock(), createElementBlock("meta", {
                    key: 1,
                    itemprop: "name",
                    content: item.label
                  }, null, 8, _hoisted_3$4)) : (openBlock(), createElementBlock("span", _hoisted_4$2, toDisplayString(item.label), 1)),
                  createBaseVNode("meta", {
                    itemprop: "position",
                    content: `${key + 1}`
                  }, null, 8, _hoisted_5$1)
                ]),
                _: 2
              }, 1032, ["to"])) : item.link ? (openBlock(), createElementBlock("a", {
                key: 1,
                class: "breadcrumb-item",
                itemprop: "item",
                href: item.link
              }, [
                props.withIcons && !!item.icon ? (openBlock(), createElementBlock("span", {
                  key: 0,
                  class: normalizeClass(["icon is-small", [
                    item.hideLabel && props.withIcons && !!item.icon && "is-solo"
                  ]])
                }, [
                  createBaseVNode("i", {
                    "aria-hidden": "true",
                    class: "iconify",
                    "data-icon": item.icon
                  }, null, 8, _hoisted_7)
                ], 2)) : createCommentVNode("", true),
                item.hideLabel && props.withIcons && !!item.icon ? (openBlock(), createElementBlock("meta", {
                  key: 1,
                  itemprop: "name",
                  content: item.label
                }, null, 8, _hoisted_8)) : (openBlock(), createElementBlock("span", _hoisted_9, toDisplayString(item.label), 1)),
                createBaseVNode("meta", {
                  itemprop: "position",
                  content: `${key + 1}`
                }, null, 8, _hoisted_10)
              ], 8, _hoisted_6)) : (openBlock(), createElementBlock("span", _hoisted_11, [
                props.withIcons && !!item.icon ? (openBlock(), createElementBlock("span", {
                  key: 0,
                  class: normalizeClass(["icon is-small", [
                    item.hideLabel && props.withIcons && !!item.icon && "is-solo"
                  ]])
                }, [
                  createBaseVNode("i", {
                    "aria-hidden": "true",
                    class: "iconify",
                    "data-icon": item.icon
                  }, null, 8, _hoisted_12)
                ], 2)) : createCommentVNode("", true),
                item.hideLabel && props.withIcons && item.icon ? (openBlock(), createElementBlock("meta", {
                  key: 1,
                  itemprop: "name",
                  content: item.label
                }, null, 8, _hoisted_13)) : (openBlock(), createElementBlock("span", _hoisted_14, toDisplayString(item.label), 1)),
                createBaseVNode("meta", {
                  itemprop: "position",
                  content: `${key + 1}`
                }, null, 8, _hoisted_15)
              ]))
            ], 8, _hoisted_1$a);
          }), 128))
        ])
      ], 2);
    };
  }
});
function setup$9(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    items: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    const _component_VBreadcrumb = _sfc_main$i;
    return openBlock(), createBlock(_component_VBreadcrumb, {
      items: unref(config).items,
      "with-icons": ""
    }, null, 8, ["items"]);
  };
}
const __default__$9 = {
  name: "gBreadCrumb"
};
const _sfc_main$h = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$9), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$9
}));
const _hoisted_1$9 = ["open"];
const _hoisted_2$6 = ["onClick"];
const _hoisted_3$3 = { class: "collapse-icon" };
const _hoisted_4$1 = { class: "collapse-content" };
const _sfc_main$g = /* @__PURE__ */ defineComponent({
  props: {
    items: { default: () => [] },
    itemOpen: { default: void 0 },
    withChevron: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    const internalItemOpen = ref(props.itemOpen);
    const toggle = (key) => {
      if (internalItemOpen.value === key) {
        internalItemOpen.value = void 0;
        return;
      }
      internalItemOpen.value = key;
    };
    return (_ctx, _cache) => {
      const _component_VIcon = _sfc_main$F;
      return openBlock(true), createElementBlock(Fragment, null, renderList(__props.items, (item, key) => {
        return openBlock(), createElementBlock("details", {
          key,
          class: normalizeClass([[__props.withChevron && "has-chevron", !__props.withChevron && "has-plus"], "collapse"]),
          open: internalItemOpen.value === key || void 0
        }, [
          createBaseVNode("summary", {
            class: "collapse-header",
            onClick: withModifiers(() => toggle(key), ["prevent"])
          }, [
            createBaseVNode("h3", null, toDisplayString(item.title), 1),
            createBaseVNode("div", _hoisted_3$3, [
              __props.withChevron ? (openBlock(), createBlock(_component_VIcon, {
                key: 0,
                icon: "feather:chevron-down"
              })) : !__props.withChevron ? (openBlock(), createBlock(_component_VIcon, {
                key: 1,
                icon: "feather:plus"
              })) : createCommentVNode("", true)
            ])
          ], 8, _hoisted_2$6),
          createBaseVNode("div", _hoisted_4$1, [
            renderSlot(_ctx.$slots, "item", { active: internalItemOpen.value }, () => [
              createBaseVNode("p", null, toDisplayString(item.content), 1)
            ])
          ])
        ], 10, _hoisted_1$9);
      }), 128);
    };
  }
});
const _hoisted_1$8 = { key: 0 };
function setup$8(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    items: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    const _component_VCollapse = _sfc_main$g;
    return openBlock(), createBlock(_component_VCollapse, {
      items: unref(config).items,
      "with-chevron": "",
      itemOpen: unref(config).active
    }, {
      item: withCtx(({ active }) => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).items, (tab, i) => {
          return openBlock(), createElementBlock("div", { key: i }, [
            active === i ? (openBlock(), createElementBlock("div", _hoisted_1$8, [
              (openBlock(true), createElementBlock(Fragment, null, renderList(tab.children, (item, i2) => {
                return openBlock(), createBlock(resolveDynamicComponent(item.component), {
                  properties: item.props,
                  scope: __props.scope,
                  key: i2
                }, null, 8, ["properties", "scope"]);
              }), 128))
            ])) : createCommentVNode("", true)
          ]);
        }), 128))
      ]),
      _: 1
    }, 8, ["items", "itemOpen"]);
  };
}
const __default__$8 = {
  name: "gAccordion"
};
const _sfc_main$f = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$8), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$8
}));
const _hoisted_1$7 = { for: "" };
const _hoisted_2$5 = ["value"];
function setup$7(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  reactive();
  const config = reactive({
    name: "",
    children: [],
    type: "dateTime",
    model: {
      type: "string",
      mask: "YYYY-MM-DD HH:mm"
    }
  });
  const state = reactive({
    repo: {},
    render: 1
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
    let def = _.get(props.scope, config.name);
    state.repo = new Repository(config.repo, def);
  });
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return "";
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  return (_ctx, _cache) => {
    const _component_VControl = __unplugin_components_0$1;
    const _component_VField = _sfc_main$J;
    const _component_v_date_picker = resolveComponent("v-date-picker");
    return openBlock(), createElementBlock("div", null, [
      createBaseVNode("label", _hoisted_1$7, toDisplayString(unref(config).title), 1),
      createVNode(_component_v_date_picker, {
        is24hr: "",
        modelValue: unref(value),
        "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => isRef(value) ? value.value = $event : null),
        mode: unref(config).type,
        color: "green",
        "model-config": unref(config).model,
        "trim-weeks": ""
      }, {
        default: withCtx(({ inputValue, inputEvents }) => [
          createVNode(_component_VField, null, {
            default: withCtx(() => [
              createVNode(_component_VControl, null, {
                default: withCtx(() => [
                  createBaseVNode("input", mergeProps({
                    class: "input",
                    value: inputValue
                  }, toHandlers(inputEvents)), null, 16, _hoisted_2$5)
                ]),
                _: 2
              }, 1024)
            ]),
            _: 2
          }, 1024)
        ]),
        _: 1
      }, 8, ["modelValue", "mode", "model-config"])
    ]);
  };
}
const __default__$7 = {
  name: "gDatepicker"
};
const _sfc_main$e = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$7), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$7
}));
const _hoisted_1$6 = ["checked"];
const _hoisted_2$4 = /* @__PURE__ */ createBaseVNode("div", { class: "slider" }, null, -1);
const _hoisted_3$2 = ["checked"];
const _hoisted_4 = /* @__PURE__ */ createBaseVNode("i", { "aria-hidden": "true" }, null, -1);
const _hoisted_5 = {
  key: 2,
  class: "text"
};
let instances = 0;
const _sfc_main$d = /* @__PURE__ */ defineComponent({
  props: {
    modelValue: { type: Boolean, default: false },
    label: { default: void 0 },
    color: { default: void 0 },
    thin: { type: Boolean }
  },
  emits: ["update:modelValue"],
  setup(__props, { emit }) {
    const props = __props;
    const blockSwitchId = `block-switch-${++instances}`;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass([
          props.label && "switch-block",
          props.thin && props.label && "thin-switch-block"
        ])
      }, [
        props.thin ? (openBlock(), createElementBlock("label", {
          key: 0,
          for: blockSwitchId,
          class: normalizeClass(["thin-switch", [props.color && `is-${props.color}`]])
        }, [
          createBaseVNode("input", mergeProps({
            id: blockSwitchId,
            checked: props.modelValue,
            class: "input",
            type: "checkbox"
          }, _ctx.$attrs, {
            onChange: _cache[0] || (_cache[0] = ($event) => emit("update:modelValue", !props.modelValue))
          }), null, 16, _hoisted_1$6),
          _hoisted_2$4
        ], 2)) : (openBlock(), createElementBlock("label", {
          key: 1,
          for: blockSwitchId,
          class: normalizeClass(["form-switch", [props.color && `is-${props.color}`]])
        }, [
          createBaseVNode("input", mergeProps({
            id: blockSwitchId,
            checked: props.modelValue,
            type: "checkbox",
            class: "is-switch"
          }, _ctx.$attrs, {
            onChange: _cache[1] || (_cache[1] = ($event) => emit("update:modelValue", !props.modelValue))
          }), null, 16, _hoisted_3$2),
          _hoisted_4
        ], 2)),
        props.label ? (openBlock(), createElementBlock("div", _hoisted_5, [
          createBaseVNode("label", { for: blockSwitchId }, [
            createBaseVNode("span", null, toDisplayString(props.label), 1)
          ])
        ])) : createCommentVNode("", true)
      ], 2);
    };
  }
});
function setup$6(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const { publish } = useEvents();
  const config = reactive({
    name: "",
    title: "",
    thin: true,
    color: "primary",
    on_change: []
  });
  const state = reactive({
    repo: {},
    render: 1
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
    let def = _.get(props.scope, config.name);
    state.repo = new Repository(config.repo, def);
  });
  function onChange() {
    config.on_change.forEach((event) => {
      return publish(event.action, event.payload, event.topic);
    });
  }
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return "";
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  return (_ctx, _cache) => {
    const _component_VSwitchBlock = _sfc_main$d;
    const _component_VControl = __unplugin_components_0$1;
    return openBlock(), createBlock(_component_VControl, null, {
      default: withCtx(() => [
        createVNode(_component_VSwitchBlock, {
          "onUpdate:modelValue": [
            onChange,
            _cache[0] || (_cache[0] = ($event) => isRef(value) ? value.value = $event : null)
          ],
          color: unref(config).color,
          thin: unref(config).thin,
          modelValue: unref(value),
          label: unref(config).title
        }, null, 8, ["color", "thin", "modelValue", "label"])
      ]),
      _: 1
    });
  };
}
const __default__$6 = {
  name: "gSwitch"
};
const _sfc_main$c = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$6), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$6
}));
const _hoisted_1$5 = ["value", "max"];
const _sfc_main$b = /* @__PURE__ */ defineComponent({
  props: {
    value: { default: void 0 },
    max: { default: 100 },
    size: { default: void 0 },
    color: { default: "primary" }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("progress", {
        class: normalizeClass(["progress", [
          props.size && `is-${props.size}`,
          props.color && `is-${props.color}`
        ]]),
        value: props.value,
        max: props.max
      }, toDisplayString(props.value ? `${props.value / props.max * 100}%` : ""), 11, _hoisted_1$5);
    };
  }
});
var Progress_vue_vue_type_style_index_0_lang = "";
const _hoisted_1$4 = { class: "m-1 pr-label" };
function setup$5(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  reactive();
  const config = reactive({
    name: "",
    title: "",
    size: "small",
    color: "primary",
    max: 100
  });
  const state = reactive({
    repo: {},
    render: 1
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
    let def = _.get(props.scope, config.name);
    state.repo = new Repository(config.repo, def);
  });
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return 0;
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  return (_ctx, _cache) => {
    const _component_VProgress = _sfc_main$b;
    return openBlock(), createElementBlock(Fragment, null, [
      createBaseVNode("div", _hoisted_1$4, toDisplayString(unref(config).title) + " : " + toDisplayString(unref(value)) + " %", 1),
      createVNode(_component_VProgress, {
        size: unref(config).size,
        max: unref(config).max,
        color: unref(config).color,
        value: unref(value)
      }, null, 8, ["size", "max", "color", "value"])
    ], 64);
  };
}
const __default__$5 = {
  name: "gProgress"
};
const _sfc_main$a = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$5), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$5
}));
const _hoisted_1$3 = { class: "avatar-stack" };
const _hoisted_2$3 = { class: "avatar is-more" };
const _hoisted_3$1 = { class: "inner" };
const _sfc_main$9 = /* @__PURE__ */ defineComponent({
  props: {
    limit: { default: 5 },
    size: { default: void 0 },
    avatars: { default: () => [] }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      const _component_VAvatar = _sfc_main$H;
      return openBlock(), createElementBlock("div", _hoisted_1$3, [
        renderSlot(_ctx.$slots, "default", {}, () => [
          (openBlock(true), createElementBlock(Fragment, null, renderList(__props.avatars.slice(0, props.limit), (avatar, index) => {
            return openBlock(), createBlock(_component_VAvatar, {
              key: index,
              size: props.size,
              picture: avatar.picture,
              initials: avatar.initials,
              color: avatar.color
            }, null, 8, ["size", "picture", "initials", "color"]);
          }), 128)),
          __props.avatars.length > props.limit ? (openBlock(), createElementBlock("div", {
            key: 0,
            class: normalizeClass(["v-avatar", [__props.size && "is-" + props.size]])
          }, [
            createBaseVNode("span", _hoisted_2$3, [
              createBaseVNode("span", _hoisted_3$1, [
                createBaseVNode("span", null, "+" + toDisplayString(__props.avatars.length - props.limit), 1)
              ])
            ])
          ], 2)) : createCommentVNode("", true)
        ])
      ]);
    };
  }
});
function setup$4(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    size: "small",
    items: []
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  const { process } = useScope(props.scope);
  const avatars = computed(() => {
    return config.items.map((item) => {
      return process(item.props);
    });
  });
  return (_ctx, _cache) => {
    const _component_VAvatarStack = _sfc_main$9;
    return openBlock(), createBlock(_component_VAvatarStack, {
      avatars: unref(avatars),
      size: unref(config).size
    }, null, 8, ["avatars", "size"]);
  };
}
const __default__$4 = {
  name: "gAvatarStack"
};
const _sfc_main$8 = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$4), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$4
}));
const _hoisted_1$2 = { key: 0 };
const _hoisted_2$2 = { key: 1 };
const _hoisted_3 = { class: "flex-end" };
const _sfc_main$7 = /* @__PURE__ */ defineComponent({
  props: {
    title: null,
    subtitle: { default: void 0 },
    infratitle: { default: void 0 },
    center: { type: Boolean },
    lighter: { type: Boolean },
    narrow: { type: Boolean },
    mResponsive: { type: Boolean },
    tResponsive: { type: Boolean }
  },
  setup(__props) {
    const props = __props;
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        class: normalizeClass([
          !props.center && "media-flex",
          props.center && "media-flex-center",
          props.narrow && "no-margin",
          props.mResponsive && "is-responsive-mobile",
          props.tResponsive && "is-responsive-tablet-p"
        ])
      }, [
        renderSlot(_ctx.$slots, "icon"),
        createBaseVNode("div", {
          class: normalizeClass(["flex-meta", [props.lighter && "is-lighter"]])
        }, [
          createBaseVNode("span", null, toDisplayString(props.title), 1),
          props.subtitle ? (openBlock(), createElementBlock("span", _hoisted_1$2, toDisplayString(props.subtitle), 1)) : createCommentVNode("", true),
          props.infratitle ? (openBlock(), createElementBlock("span", _hoisted_2$2, toDisplayString(props.infratitle), 1)) : createCommentVNode("", true),
          renderSlot(_ctx.$slots, "default")
        ], 2),
        createBaseVNode("div", _hoisted_3, [
          renderSlot(_ctx.$slots, "action")
        ])
      ], 2);
    };
  }
});
function setup$3(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    title: "",
    subtitle: "",
    icon: [],
    action: [],
    center: true
  });
  const { process } = useScope(props.scope);
  onMounted(() => {
    config.value = apply2(props.properties, config);
  });
  return (_ctx, _cache) => {
    const _component_VBlock = _sfc_main$7;
    return openBlock(), createBlock(_component_VBlock, {
      title: unref(process)(unref(config).title),
      subtitle: unref(process)(unref(config).subtitle),
      center: unref(config).center
    }, {
      icon: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).icon, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: __props.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]),
      action: withCtx(() => [
        (openBlock(true), createElementBlock(Fragment, null, renderList(unref(config).action, (item, i) => {
          return openBlock(), createBlock(resolveDynamicComponent(item.component), {
            properties: item.props,
            scope: __props.scope,
            key: i
          }, null, 8, ["properties", "scope"]);
        }), 128))
      ]),
      _: 1
    }, 8, ["title", "subtitle", "center"]);
  };
}
const __default__$3 = {
  name: "gBlock"
};
const _sfc_main$6 = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$3), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$3
}));
const _hoisted_1$1 = ["checked", "value", "name"];
const _hoisted_2$1 = /* @__PURE__ */ createBaseVNode("span", null, null, -1);
const _sfc_main$5 = /* @__PURE__ */ defineComponent({
  props: {
    value: null,
    modelValue: { default: void 0 },
    name: null,
    label: { default: void 0 },
    color: { default: void 0 },
    square: { type: Boolean },
    solid: { type: Boolean },
    paddingless: { type: Boolean, default: false }
  },
  emits: ["update:modelValue"],
  setup(__props, { emit }) {
    const props = __props;
    const checked = computed(() => props.value === props.modelValue);
    function change() {
      emit("update:modelValue", props.value);
    }
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("label", {
        class: normalizeClass(["radio", [
          props.solid ? "is-solid" : "is-outlined",
          props.square && "is-square",
          props.color && `is-${props.color}`,
          props.paddingless && "is-paddingless"
        ]])
      }, [
        createBaseVNode("input", mergeProps({
          type: "radio",
          checked: unref(checked),
          value: props.value,
          name: props.name
        }, _ctx.$attrs, { onChange: change }), null, 16, _hoisted_1$1),
        _hoisted_2$1,
        createTextVNode(" " + toDisplayString(props.label || props.value), 1)
      ], 2);
    };
  }
});
function setup$2(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  useEvents();
  const config = reactive({
    name: "",
    title: "",
    thin: true,
    color: "primary",
    val: "",
    solid: false,
    on_change: []
  });
  const state = reactive({
    repo: {},
    render: 1
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
    let def = _.get(props.scope, config.name);
    state.repo = new Repository(config.repo, def);
  });
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return "";
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  return (_ctx, _cache) => {
    const _component_VRadio = _sfc_main$5;
    const _component_VControl = __unplugin_components_0$1;
    const _component_VField = _sfc_main$J;
    return openBlock(), createBlock(_component_VField, null, {
      default: withCtx(() => [
        createVNode(_component_VControl, null, {
          default: withCtx(() => [
            createVNode(_component_VRadio, {
              modelValue: unref(value),
              "onUpdate:modelValue": _cache[0] || (_cache[0] = ($event) => isRef(value) ? value.value = $event : null),
              value: unref(config).val,
              label: unref(config).title,
              name: unref(config).name,
              solid: unref(config).solid,
              color: unref(config).color
            }, null, 8, ["modelValue", "value", "label", "name", "solid", "color"])
          ]),
          _: 1
        })
      ]),
      _: 1
    });
  };
}
const __default__$2 = {
  name: "gRadio"
};
const _sfc_main$4 = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$2), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$2
}));
var VBillboardJS_vue_vue_type_style_index_0_lang = "";
const _sfc_main$3 = /* @__PURE__ */ defineComponent({
  props: {
    options: null
  },
  emits: ["ready"],
  setup(__props, { emit }) {
    const props = __props;
    const element = ref();
    watchEffect(() => {
      if (element.value) {
        try {
          const billboard = bb.generate(__spreadProps(__spreadValues({}, props.options), {
            bindto: element.value
          }));
          emit("ready", billboard);
          nextTick(() => {
            billboard.resize();
          });
        } catch (error) {
          console.error(error);
        }
      }
    });
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("div", {
        ref: (_value, _refs) => {
          _refs["element"] = _value;
          element.value = _value;
        }
      }, null, 512);
    };
  }
});
function setup$1(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const config = reactive({
    init: false,
    legend: "",
    percentage: null,
    columns: [["Win", 0]],
    threshold: [30, 60, 90, 100],
    height: 120,
    show_legend: false,
    colors: [
      themeColors.primary,
      themeColors.info,
      themeColors.orange,
      themeColors.green
    ]
  });
  const options = reactive({
    data: {
      columns: config.columns,
      type: gauge()
    },
    gauge: {},
    color: {
      pattern: config.colors,
      threshold: {
        values: []
      }
    },
    size: {
      height: config.height
    },
    padding: {
      bottom: 0
    },
    legend: {
      show: false,
      position: "inset"
    }
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
    setGaugeOptions();
  });
  function setGaugeOptions() {
    options.size.height = config.height;
    const value = config.percentage != null ? config.percentage : 0;
    options.data.columns = [[config.legend, value]];
    options.legend.show = config.show_legend;
    options.color.threshold.values = config.threshold;
    config.init = true;
  }
  return (_ctx, _cache) => {
    const _component_VBillboardJS = _sfc_main$3;
    return unref(config).init ? (openBlock(), createBlock(_component_VBillboardJS, {
      key: 0,
      class: "gauge-holder",
      options: unref(options)
    }, null, 8, ["options"])) : createCommentVNode("", true);
  };
}
const __default__$1 = {
  name: "gGauge"
};
const _sfc_main$2 = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__$1), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup: setup$1
}));
const _hoisted_1 = ["checked", "value"];
const _hoisted_2 = /* @__PURE__ */ createBaseVNode("span", null, null, -1);
const _sfc_main$1 = /* @__PURE__ */ defineComponent({
  props: {
    value: { default: void 0 },
    label: { default: void 0 },
    color: { default: void 0 },
    modelValue: { default: () => [] },
    circle: { type: Boolean, default: false },
    solid: { type: Boolean, default: false },
    paddingless: { type: Boolean, default: false }
  },
  emits: ["update:modelValue"],
  setup(__props, { emit }) {
    const props = __props;
    const checked = computed(() => props.modelValue.includes(props.value));
    function change() {
      const values = [...props.modelValue];
      if (checked.value) {
        values.splice(values.indexOf(props.value), 1);
      } else {
        values.push(props.value);
      }
      emit("update:modelValue", values);
    }
    return (_ctx, _cache) => {
      return openBlock(), createElementBlock("label", {
        class: normalizeClass(["checkbox", [
          props.solid ? "is-solid" : "is-outlined",
          props.circle && "is-circle",
          props.color && `is-${props.color}`,
          props.paddingless && "is-paddingless"
        ]])
      }, [
        createBaseVNode("input", mergeProps({
          type: "checkbox",
          checked: unref(checked),
          value: props.value
        }, _ctx.$attrs, { onChange: change }), null, 16, _hoisted_1),
        _hoisted_2,
        createTextVNode(" " + toDisplayString(props.label), 1)
      ], 2);
    };
  }
});
function setup(__props) {
  const props = __props;
  const { apply: apply2 } = useProperties();
  const { publish } = useEvents();
  const config = reactive({
    name: "",
    label: "",
    circle: false,
    color: "primary",
    val: "",
    solid: false,
    on_change: []
  });
  const state = reactive({
    repo: {},
    render: 1
  });
  onMounted(() => {
    config.value = apply2(props.properties, config);
    let def = _.get(props.scope, config.name);
    state.repo = new Repository(config.repo, def);
  });
  function onChange(payload) {
    config.on_change.forEach((event) => {
      return publish(event.action, event.payload, event.topic);
    });
  }
  const value = computed({
    get() {
      state.render++;
      if (state.repo.get) {
        return state.repo.get();
      }
      return "";
    },
    set(value2) {
      state.repo.set(value2);
    }
  });
  return (_ctx, _cache) => {
    const _component_VCheckbox = _sfc_main$1;
    const _component_VControl = __unplugin_components_0$1;
    const _component_VField = _sfc_main$J;
    return openBlock(), createBlock(_component_VField, null, {
      default: withCtx(() => [
        createVNode(_component_VControl, null, {
          default: withCtx(() => [
            createVNode(_component_VCheckbox, {
              modelValue: unref(value),
              "onUpdate:modelValue": [
                _cache[0] || (_cache[0] = ($event) => isRef(value) ? value.value = $event : null),
                onChange
              ],
              value: unref(config).val,
              label: unref(config).label,
              color: unref(config).color,
              circle: unref(config).circle
            }, null, 8, ["modelValue", "value", "label", "color", "circle"])
          ]),
          _: 1
        })
      ]),
      _: 1
    });
  };
}
const __default__ = {
  name: "gCheckbox"
};
const _sfc_main = /* @__PURE__ */ defineComponent(__spreadProps(__spreadValues({}, __default__), {
  props: {
    properties: {
      type: Object,
      default() {
        return {};
      }
    },
    scope: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  setup
}));
const GlobalComponents = {
  install(app) {
    app.component(_sfc_main$O.name, _sfc_main$O);
    app.component(_sfc_main$S.name, _sfc_main$S);
    app.component(_sfc_main$Q.name, _sfc_main$Q);
    app.component(_sfc_main$N.name, _sfc_main$N);
    app.component(_sfc_main$M.name, _sfc_main$M);
    app.component(_sfc_main$L.name, _sfc_main$L);
    app.component(_sfc_main$I.name, _sfc_main$I);
    app.component(_sfc_main$G.name, _sfc_main$G);
    app.component(_sfc_main$D.name, _sfc_main$D);
    app.component(_sfc_main$C.name, _sfc_main$C);
    app.component(_sfc_main$B.name, _sfc_main$B);
    app.component(_sfc_main$A.name, _sfc_main$A);
    app.component(_sfc_main$z.name, _sfc_main$z);
    app.component(_sfc_main$x.name, _sfc_main$x);
    app.component(_sfc_main$v.name, _sfc_main$v);
    app.component(_sfc_main$t.name, _sfc_main$t);
    app.component(_sfc_main$s.name, _sfc_main$s);
    app.component(_sfc_main$q.name, _sfc_main$q);
    app.component(_sfc_main$p.name, _sfc_main$p);
    app.component(_sfc_main$o.name, _sfc_main$o);
    app.component(Selectable.name, Selectable);
    app.component(_sfc_main$m.name, _sfc_main$m);
    app.component(_sfc_main$l.name, _sfc_main$l);
    app.component(_sfc_main$j.name, _sfc_main$j);
    app.component(_sfc_main$h.name, _sfc_main$h);
    app.component(_sfc_main$f.name, _sfc_main$f);
    app.component(_sfc_main$e.name, _sfc_main$e);
    app.component(_sfc_main$c.name, _sfc_main$c);
    app.component(_sfc_main$a.name, _sfc_main$a);
    app.component(_sfc_main$8.name, _sfc_main$8);
    app.component(_sfc_main$6.name, _sfc_main$6);
    app.component(_sfc_main$4.name, _sfc_main$4);
    app.component(_sfc_main$2.name, _sfc_main$2);
    app.component(_sfc_main.name, _sfc_main);
  }
};
createApp({
  async enhanceApp(app) {
    const VCalendar = (await __vitePreload(() => import("./index.821b5521.js"), true ? ["assets/index.821b5521.js","assets/vendor.32cd07bc.js"] : void 0)).default;
    const VueMultiselect = (await __vitePreload(() => import("./multiselect.2fe8a624.js"), true ? ["assets/multiselect.2fe8a624.js","assets/vendor.32cd07bc.js"] : void 0)).default;
    const VueSlider = (await __vitePreload(() => import("./slider.83c6f934.js"), true ? ["assets/slider.83c6f934.js","assets/vendor.32cd07bc.js"] : void 0)).default;
    const VueTippy = (await __vitePreload(() => import("./vue-tippy.esm-bundler.d30ce518.js"), true ? ["assets/vue-tippy.esm-bundler.d30ce518.js","assets/vendor.32cd07bc.js"] : void 0)).default;
    const hasNestedRouterLink = (await __vitePreload(() => import("./has-nested-router-link.4fe8dab1.js"), true ? [] : void 0)).default;
    const background = (await __vitePreload(() => import("./background.5bd78b71.js"), true ? [] : void 0)).default;
    const tooltip = (await __vitePreload(() => import("./tooltip.24128ff9.js"), true ? [] : void 0)).default;
    app.use(VCalendar);
    app.use(GlobalComponents);
    app.use(VueTippy, {
      defaultProps: {
        theme: "light"
      }
    });
    app.use(store);
    app.component(VueMultiselect.name, VueMultiselect);
    app.component(VueSlider.name, VueSlider);
    app.directive("has-nested-router-link", hasNestedRouterLink);
    app.directive("background", background);
    app.directive("tooltip", tooltip);
  }
}).then(async ({ app, router }) => {
  await router.isReady();
  app.mount("#app");
});
export { Api as A, _export_sfc as _, __unplugin_components_0$2 as a, __unplugin_components_0$1 as b, _sfc_main$J as c, _sfc_main$X as d, useNotyf as e, useDropdown as f, useViaPlaceholderError as g, _sfc_main$H as h, isDark as i, __unplugin_components_0 as j, _sfc_main$y as k, useApi as l, _sfc_main$_ as m, toggleDarkModeHandler as t, useUserSession as u };
