import Vapi from "vuex-rest-api"

export default new Vapi({
    baseURL: "./api",
      state: {
        events: [],
        event: null,
        auth: null
      }
    })
    .get({
      action: "getEvents",
      property: "events",
      path: "/events"
    })
    .post({
      action: "createEvent",
      property: "event",
      path: "/event"
    })
    .post({
      action: "loginUser",
      property: "auth",
      path: "/login"
    })
    .getStore();