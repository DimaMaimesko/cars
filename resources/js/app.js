
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

export const eventBus = new Vue;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('cities-component',     require('./components/CitiesComponent.vue'));
Vue.component('order-form-component', require('./components/OrderFormComponent.vue'));
Vue.component('alert-component',      require('./components/AlertComponent.vue'));
Vue.component('order-list-component', require('./components/OrderListComponent.vue'));
Vue.component('currency-component',   require('./components/CurrencyComponent.vue'));
Vue.component('update-rate-component',require('./components/UpdateRateComponent.vue'));
Vue.component('slider-component',     require('./components/SliderComponent.vue'));
Vue.component('faq-accordion',        require('./components/FaqAccordion.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app'
});


$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
