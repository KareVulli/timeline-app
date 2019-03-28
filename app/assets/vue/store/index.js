import Vue from 'vue';
import Vuex from 'vuex';
//import EventModule from './event';
import APIStore from '../api/event.js';

Vue.use(Vuex);

export default new Vuex.Store(APIStore);