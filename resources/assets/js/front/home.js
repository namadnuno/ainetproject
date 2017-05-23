
require('./bootstrap')

$('.parallax-window').parallax();


Vue.component('auth-menu', require('./components/AuthMenu.vue'));

const app = new Vue({
    el: '#menu'
});
