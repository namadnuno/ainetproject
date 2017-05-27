require('./bootstrap')

$('.parallax-window').parallax();

Vue.component('auth-menu', require('./components/AuthMenu.vue'));
Vue.component('department-requests-types', require('./components/departmentRequestsTypes.vue'));
Vue.component('user-requests-types', require('./components/userRequestsTypes.vue'));
Vue.component('user-week-status', require('./components/userWeekStatus.vue'));

const app = new Vue({
    el: '#menu'
});

const contentApp = new Vue({
   el: '#content'
});