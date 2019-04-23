import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home';
import Events from '../views/Events';
import Timeline from '../views/Timeline';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/home', component: Home },
        { path: '/events', component: Events },
        { path: '/timeline', component: Timeline },
        { path: '*', redirect: '/home' }
    ],
});