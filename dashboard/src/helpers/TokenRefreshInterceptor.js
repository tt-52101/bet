import axios from "axios";
import router from "@/router";
import store from "@/GlobalStore";

export default {
  register() {
    axios.interceptors.response.use(
      response => {
        // Return a successful response back to the calling service
        return response;
      },
      error => {
        // Return any error which is not due to authentication back to the calling service
        if (error.response.status === 403) {
          store.commit("alert/saveResponse", error.response.data);
          router.push({
            path: "/permission/deny"
          });

          return new Promise((resolve, reject) => {
            reject(error);
          });
        }

        // Return any error which is not due to authentication back to the calling service
        if (error.response.status !== 401) {
          return new Promise((resolve, reject) => {
            reject(error);
          });
        }

        // Logout user if token refresh didn't work or user is disabled
        if (error.config.url.includes("/api/auth/refresh")) {
          router.push({ path: "/login" });
          return new Promise((resolve, reject) => {
            store.commit("auth/logout", {
              router: router
            });
            reject(error);
          });
        }

        return store.dispatch("auth/refresh", {
          configuration: error.config
        });
      }
    );
  }
};
