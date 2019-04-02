import Vue from 'vue';
import Vuex from 'vuex';
//import EventModule from './event';
import APIStore from '../api/event.js';
import Auth from './auth.js';

Vue.use(Vuex);

const token = localStorage.getItem('token');
if (token) {
    APIStore.state.auth = {token: token};
}

APIStore.mutations = {
    ...APIStore.mutations,
    logout: (state) => {
        state.auth = null;
    }
}

APIStore.getters = {
    ...APIStore.getters,
    isLoggedIn: (state) => state.auth !== null
}

const store = new Vuex.Store({
    ...APIStore,
    plugins: [Auth],
    strict: true
});


export default store;