if(!self.define){let e,s={};const a=(a,c)=>(a=new URL(a+".js",c).href,s[a]||new Promise((s=>{if("document"in self){const e=document.createElement("script");e.src=a,e.onload=s,document.head.appendChild(e)}else e=a,importScripts(a),s()})).then((()=>{let e=s[a];if(!e)throw new Error(`Module ${a} didn’t register its module`);return e})));self.define=(c,i)=>{const d=e||("document"in self?document.currentScript.src:"")||location.href;if(s[d])return;let r={};const f=e=>a(e,d),b={module:{uri:d},exports:r,require:f};s[d]=Promise.all(c.map((e=>b[e]||f(e)))).then((e=>(i(...e),r)))}}define(["./workbox-3e4da89b"],(function(e){"use strict";self.addEventListener("message",(e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()})),e.precacheAndRoute([{url:"assets/[...all].cd05e41e.css",revision:"33b2411a95bf7ebe212a66b7124dd397"},{url:"assets/[...all].f1945a23.js",revision:"aad5e25b526db165b3d8380977dac58d"},{url:"assets/app.0c68f0cc.js",revision:"cddf98ee77b09720fc41ec76077896bc"},{url:"assets/AppLayout.5fae32f8.js",revision:"fc4e237384cf8bb82b2057667d055bf8"},{url:"assets/AppLayout.d058e740.css",revision:"adf0a3bcb004ab09f40afa51ea7be74b"},{url:"assets/auth.3beb8099.css",revision:"92025cf6221ba0760c313d0e66a16efd"},{url:"assets/Auth.dc913cda.js",revision:"136fc45e4504515faa530a3865988dd9"},{url:"assets/auth.f3b04e61.js",revision:"f9377455f9c30a212016b64509e4a5f2"},{url:"assets/background.5bd78b71.js",revision:"efdc6a8f238eb52bad95db87a24f3637"},{url:"assets/has-nested-router-link.4fe8dab1.js",revision:"72e78068f7ff0648792ce2825b3b425b"},{url:"assets/index.294f82d5.js",revision:"acadcca7ec503b707f21cea7d75111b5"},{url:"assets/index.2a38b33c.css",revision:"53df44fc39d9e38e7c36864df3f665a9"},{url:"assets/index.34cdef1e.js",revision:"37e3372f0ca3755f1a3d2928b986ca4c"},{url:"assets/index.34e397f1.js",revision:"36df8d69efae8e67f68b5fd084da7f43"},{url:"assets/index.4f3cf14f.css",revision:"4021e32e897e580805513c4e8e06dc08"},{url:"assets/index.4fc555dd.js",revision:"c876cb448cdec0cfda41a9e878fdd632"},{url:"assets/index.b9e4809b.js",revision:"e44b4b28dc1ea31333fb088713922c61"},{url:"assets/login.abaec998.js",revision:"b0a4348feb135f110868c7055904cc11"},{url:"assets/multiselect.604263b5.js",revision:"28cb84af238812e12d9c8190f1a7603f"},{url:"assets/sidebarLayoutState.e7e014d2.js",revision:"5cd3d8844771bcfdbd1948b71c9814f7"},{url:"assets/signup.e8f23c4a.js",revision:"a35e1cc89791705362a52e6edf621fee"},{url:"assets/slider.cd656c1c.js",revision:"09a2f0638bc71201d73111063d11311a"},{url:"assets/tooltip.24128ff9.js",revision:"a919e07cc439a2e336d14a0ae71f119a"},{url:"assets/vendor.5ec5354d.js",revision:"87de2279edb40f4d587ab280e9bba75a"},{url:"assets/vue-tippy.esm-bundler.76b17270.js",revision:"222dcbaccb46ceaa102e3d7bfc06d71d"},{url:"index.html",revision:"66eed2b1abef69453942cba6b73ad2f4"},{url:"vendors/font-awesome-v5.css",revision:"4c8b74382b4f6b2cf5f8afcb87e80abc"},{url:"vendors/line-icons-pro.css",revision:"4bb4c5797d6ce8bd02b13e2d12c34bcd"},{url:"vendors/prism-coldark-cold.css",revision:"238822f024eb9bd172d4d6494cacd69c"},{url:"favicon.svg",revision:"524cab7b5e455d34a449368438cdbfea"},{url:"favicon.ico",revision:"2608995d3ce047aed1b4f12314b971e6"},{url:"robots.txt",revision:"f77c87f977e0fcce05a6df46c885a129"},{url:"apple-touch-icon.png",revision:"2ae749c1e0baa7b1a7515c065e55f078"},{url:"pwa-192x192.png",revision:"0eacfebd56260472c8d8555ca52e05a8"},{url:"pwa-512x512.png",revision:"9bf509b0ae7225cd9894e72ee8cbe872"},{url:"manifest.webmanifest",revision:"dffbc68d6792c8e2ee5bb914d28267c8"}],{}),e.cleanupOutdatedCaches(),e.registerRoute(new e.NavigationRoute(e.createHandlerBoundToURL("index.html")))}));
