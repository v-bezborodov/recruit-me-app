/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import services from './services/services.service';
import shared from './shared/shared.service';
import '../bootstrap';
import 'vue-multiselect/dist/vue-multiselect.min.css';
import Toasted from 'vue-toasted';
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/css/bootstrap.css';
import CKEditor from '@ckeditor/ckeditor5-vue';
import Multiselect from 'vue-multiselect';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('table-component', require('./components/TableComponent.vue').default);
Vue.component('recrutation-component', require('./components/Recrutation.component.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
// Vue.component('table-component-profile', require('./components/TableComponentProfile.vue').default);
Vue.component('avatar-component-profile', require('./components/avatarComponentProfile.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(Toasted, {
  duration: 3000,
});
Vue.use(CKEditor);
Vue.use(BootstrapVue);
Vue.use(services);
Vue.use(shared);
Vue.component('multiselect', Multiselect);



window.onload = function () {
  new Vue({
    el: '#app',
  });
};



