
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VeeValidate, { Validator }  from 'vee-validate';

require('./bootstrap');
window.Vue = require('vue');
import { BootstrapVue } from 'bootstrap-vue'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);


console.error(files.keys()[0]);
console.error(files.keys()[0].split('/'));
console.error(files.keys()[0].split('/').pop());
console.error(files.keys()[0].split('/').pop().split('.'));
console.error(files.keys()[0].split('/').pop().split('.')[0]);
console.error(files(files.keys()[0]));
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VeeValidate, {
    inject: true,
    fieldsBagName: 'veeFields'
});
Vue.use(BootstrapVue);

new Vue({
    el: '#app',
});
