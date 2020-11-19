
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

require('./bootstrap');

window.Vue = require('vue');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// Vue.component('empleado', require('./components/Empleado.vue'));
// window.onload = function () {

// const app = new Vue({
//     el: '#app',
//     // components: { App }
// });

// }

import App from './components/Empleado.vue'



// const router = new VueRouter({
//     base: '/ejercicio2/public/',
//     routes: [{path: '/ejercicio2/public/', component: App}],
// });

const app = new Vue({
    el: '#app',
    components: { App },
    // router,
});
