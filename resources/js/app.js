require('./bootstrap');

window.Vue=require('vue')
//Vue.component('Navbar',require('./components/navbar.vue').default);
Vue.component('Hello',require('./components/hello.vue').default)


new Vue({
    el:"#app"
});
