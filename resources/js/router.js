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
import addAccount from './components/account/Add.vue'
import account from './components/account/Show.vue'
import Order from './components/order/Show.vue'
import book from './components/book/Show.vue'
import addBook from './components/book/Add.vue'
import trangchu from './components/user/Home.vue'
import register from './components/user/Register.vue'
import search from './components/user/Search.vue'
import allbook from './components/user/Allbook.vue'
import detailbook from './components/user/Detail.vue'
import cart from './components/user/Cart.vue'
import checkout from './components/user/checkout/Checkout.vue'
import profile from './components/user/profile/Profile.vue'
import checkOrder from './components/user/profile/CheckOrder.vue'
import loginadmin from './components/admin/Login.vue'
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
        path: '/admin/order',
        component: Order,
        name: 'order'
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
    {
        path: '/admin/account',
        component: account,
        name: 'account'
    },
    {
        path: '/admin/categories/addAccount',
        component: addAccount,
        name: 'addAccount'
    },
    {
        path: '/',
        component: trangchu,
        name: 'trangchu'
    },
    {
        path: '/register',
        component: register,
        name: 'register'
    },
    {
        path: '/book',
        component: allbook,
        name: 'allbook'
    },
    {
        path: '/book/:id',
        component: allbook,
        name: 'sortbook'
    },
    {
        path: '/book/chitiet/:id',
        component: detailbook,
        name: 'detailbook'
    },
    {
        path: '/sreach/:id',
        component: search,
        name: 'search'
    },
    {
        path: '/cart',
        component: cart,
        name: 'cart'
    },
    {
        path: '/checkout',
        component: checkout,
        name: 'checkout'
    },
    {
        path: '/profile',
        component: profile,
        name: 'profile'
    },
    {
        path: '/profile/order',
        component: checkOrder,
        name: 'checkorder'
    },
    {
        path: '/login_admin',
        component: loginadmin,
        name: 'loginadmin'
    },
]
export const router = new Router({
    // base: 'admin',
    mode: 'history',
    routes
})