
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
Vue.component('chart-mouth-prints', require('./components/chart-mouth-prints.vue'));
Vue.component('remover-objeto', require('./components/RemoverObjeto.vue'));
Vue.component('evaluate-pedido', require('./components/EvaluatePedido.vue'));
Vue.component('auth-menu', require('./front/components/AuthMenu.vue'));
Vue.component('user-requests-types', require('./front/components/userRequestsTypes.vue'));
Vue.component('user-week-status', require('./front/components/userWeekStatus.vue'));
Vue.component('printer-requests-types', require('./components/printerRequestsTypes.vue'));

const app = new Vue({
    el: '#app'
});

const menu = new Vue({
    el: '#menu'
});

