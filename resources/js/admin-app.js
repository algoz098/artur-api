
require('./bootstrap');

window.Vue = require('vue');

Vue.component('select-user', require('./components/select/user.vue').default);
Vue.component('select-all', require('./components/select/all.vue').default);


const app = new Vue({
    el: '#app',

    mounted(){
        $('[data-toggle="tooltip"]').tooltip()
    },

    methods:{
        submit(path){
            let form = document.querySelector('#form')
            form.action = path
            form.submit()
        },

        selectCheckbox(i){
            let el = document.querySelector('#checkbox_' + i)
            el.checked = !el.checked
        }
    }
});
