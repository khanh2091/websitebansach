import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import home from './components/admin/Home.vue'
import Tacgia from './components/author/Show.vue'
import addAuthor from './components/author/Add.vue'
const routes = [{
        path: '/admin',
        component: home,
        name: 'home'

    },
    {
        path: '/admin/author',
        component: Tacgia,
        name: 'author'
    },
    {
        path: '/admin/author/addAuthor',
        component: addAuthor,
        name: 'addAuthor'
    },

]
export const router = new Router({
    // base: 'admin',
    mode: 'history',
    routes
})