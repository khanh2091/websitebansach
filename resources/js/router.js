import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import home from './components/admin/Home.vue'
import Tacgia from './components/author/Show.vue'

const routes = [{
        path: '',
        component: home,
        name: 'home'

    },
    {
        path: '/author',
        component: Tacgia,
        name: 'author'
    },

]
export const router = new Router({
    base: 'admin',
    mode: 'history',
    routes
})