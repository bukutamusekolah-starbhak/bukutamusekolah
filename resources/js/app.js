require('./bootstrap');

import  Form from 'vform';
import  HasError from 'vform';
import  AlertError from 'vform';
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import Vue from 'vue'
import VueAxios from 'vue-axios';
import axios from 'axios';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import VueRouter from 'vue-router';
import {routes} from './routes';
// import { component } from 'vue/types/umd';
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueRouter)
Vue.use(VueAxios, axios);

window.Vue = require('vue').default;

Vue.component('welcome', require('./components/Welcome.vue').default);

const router = new VueRouter({
    // mode: 'history',
    routes
})
const welcome = new Vue({
    el: '#welcome',
    router
})