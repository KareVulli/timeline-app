import Vapi from "vuex-rest-api"

export default new Vapi({
    baseURL: "./api",
      state: {
        events: [],
        event: null
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
    .getStore();