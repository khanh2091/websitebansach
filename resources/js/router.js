import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import home from './components/admin/Home.vue'
import Tacgia from './components/author/Show.vue'
import addAuthor from './components/author/Add.vue'
import publisher from './components/publisher/Show.vue'
import addPublisher from './components/publisher/Add.vue'
import language from './components/language/Show.vue'
import addLanguage from './components/language/Add.vue'
import categories from './components/categorie/Show.vue'
import addCategories from './components/categorie/Add.vue'
import book from './components/book/Show.vue'
import addBook from './components/book/Add.vue'
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
    {
        path: '/admin/publisher',
        component: publisher,
        name: 'publisher'
    },
    {
        path: '/admin/publisher/addPublisher',
        component: addPublisher,
        name: 'addPublisher'
    },
    {
        path: '/admin/language',
        component: language,
        name: 'language'
    },
    {
        path: '/admin/language/addLanguage',
        component: addLanguage,
        name: 'addLanguage'
    },
    {
        path: '/admin/categories',
        component: categories,
        name: 'categories'
    },
    {
        path: '/admin/categories/addCategories',
        component: addCategories,
        name: 'addCategories'
    },
    {
        path: '/admin/books',
        component: book,
        name: 'book'
    },
    {
        path: '/admin/categories/addBook',
        component: addBook,
        name: 'addBook'
    },
]
export const router = new Router({
    // base: 'admin',
    mode: 'history',
    routes
})