/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import Vue from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import RadioFavorite from './components/RadioFavorite.vue';
import RadioTable from './components/RadioTable.vue';
import OpenModal from './components/OpenModal.vue';
import Paginate from 'vuejs-paginate';

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('ExampleComponent', require('./components/ExampleComponent.vue').default);

Vue.component('RadioFavorite', require('./components/RadioFavorite.vue').default);

Vue.component('RadioTable',require('./components/RadioTable.vue').default);

Vue.component('OpenModal',require('./components/OpenModal.vue').default);

Vue.component('Paginate', Paginate);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(document).ready(function(){
    $(".select").select2({
        language:'ja',
        placeholder: "番組検索",
        allowClear:true,
    });
})

const app = new Vue({
    el: '#app',
    component:{
        ExampleComponent,
        RadioFavorite,
        RadioTable,
        OpenModal,
    }
});
