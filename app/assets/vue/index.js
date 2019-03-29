import Vue from 'vue';
import App from './App';
import router from './router';
import store from './store';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import '../css/app.scss';

Vue.use(BootstrapVue);

new Vue({
    template: '<App/>',
    components: { App },
    router,
    store,
}).$mount('#app');

