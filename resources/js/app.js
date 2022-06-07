require('./bootstrap');
window.Vue = require('vue').default
import { router } from './router.js'
import BootstrapVue from 'bootstrap-vue'

import "bootstrap-vue/dist/bootstrap-vue.css"
Vue.use(BootstrapVue);
Vue.component('main-app', require('./components/Mainapp.vue').default);
Vue.component('account-admin', require('./components/admin/Header.vue').default);
Vue.component('nav-admin', require('./components/admin/Nav.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
// Vue.component('home', require('./components/admin/Home.vue').default);
// Vue.component('author', require('./components/author/index.vue').default);
const app = new Vue({
    el: '#app',
    router,
});