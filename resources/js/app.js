require('./bootstrap');
window.Vue = require('vue').default
import { router } from './router.js'
import BootstrapVue from 'bootstrap-vue'
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getFirestore } from 'firebase/firestore/lite';
import { getStorage } from "firebase/storage";
// import VueFire from 'vuefire'


import "bootstrap-vue/dist/bootstrap-vue.css"
const firebaseConfig = {
    apiKey: "AIzaSyBsVEdKTfWvhixBXL6zAFLgH-a0H-yLTpM",
    authDomain: "cuahangsach-72746.firebaseapp.com",
    projectId: "cuahangsach-72746",
    storageBucket: "cuahangsach-72746.appspot.com",
    messagingSenderId: "839155698863",
    appId: "1:839155698863:web:526d5d55911b3e7124185a",
    measurementId: "G-MCCPFLQQ97"
};

// Initialize Firebase
const store = initializeApp(firebaseConfig);
const analytics = getAnalytics(store);
const db = getFirestore(store);
const storage = getStorage(store);
Vue.use(BootstrapVue);
Vue.component('main-app', require('./components/Mainapp.vue').default);
Vue.component('account-admin', require('./components/admin/Header.vue').default);
Vue.component('nav-admin', require('./components/admin/Nav.vue').default);
Vue.component('trang-chu', require('./components/user/Trangchu.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
// Vue.component('home', require('./components/admin/Home.vue').default);
// Vue.component('author', require('./components/author/index.vue').default);
const app = new Vue({
    el: '#app',
    router,
});