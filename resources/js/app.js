/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import services from './services/services.plugin';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('table-component', require('./components/TableComponent.vue').default);
Vue.component('modal-component', require('./components/modalComponent.vue').default);
Vue.component('table-component-profile', require('./components/TableComponentProfile.vue').default);
Vue.component('avatar-component-profile', require('./components/avatarComponentProfile.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// register the plugin on vue
import Toasted from 'vue-toasted';

Vue.use(Toasted);

// you can also pass options, check options reference below
// Vue.use(Toasted, Options)

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)


window.onload = function () {

    const app = new Vue({
        el: '#app',
    });
}



