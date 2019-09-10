/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import services from './services/services.plugin';
import Toasted from 'vue-toasted';
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/css/bootstrap.css';
import CKEditor from '@ckeditor/ckeditor5-vue';


require('../bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('table-component', require('./components/TableComponent.vue').default);
Vue.component('modal-component', require('./components/modalComponent.vue').default);
Vue.component('table-component-profile', require('./components/TableComponentProfile.vue').default);
Vue.component('avatar-component-profile', require('./components/avatarComponentProfile.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(Toasted, {
    duration: 3000,
});

Vue.use(BootstrapVue)
Vue.use(CKEditor);




window.onload = function () {
    const app = new Vue({
        el: '#app',
    });
}



