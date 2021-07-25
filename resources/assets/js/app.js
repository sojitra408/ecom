/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import Toasted from 'vue-toasted';
import * as config from './config/config';
import vueResource from 'vue-resource'
import VueSession from 'vue-session'
import JsonCSV from 'vue-json-csv'
import Paginate from 'vuejs-paginate'

//import VeeValidate from 'vee-validate';
//Vue.use(VeeValidate)
//Vue.use(VeeValidate, {fieldsBagName: 'formFields'});

import VueFormWizard from 'vue-form-wizard'
Vue.use(VueFormWizard);



import VueI18n from 'vue-i18n';
Vue.use(VueI18n);

const messages = {
    'en': {},
    'es': {}
};

const i18n = new VueI18n({
    locale: 'en', // set locale
    fallbackLocale: 'es', // set fallback locale
    messages, // set locale messages
});


import * as defines from './config/defines'
Vue.prototype.$defines = defines

import Loading from 'vue-loading-overlay';
 // Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';


Vue.use(vueResource)
Vue.use(Toasted)
Vue.prototype.$config = config;
Vue.prototype.$axios = axios;

import System from './plugins/system'
import api from './plugins/api'
import store from './plugins/store'
//import ui from './plugins/ui'
import session from './plugins/session'


Vue.use( axios, window)
Vue.use(api, { axios, config });

//Vue.use(ui);
import { router } from './router/routes';


//import { store } from './vuex/store';

import App from './components/App';
Vue.use(store);
Vue.use(System, { axios, config })
Vue.component('downloadCsv', JsonCSV);
Vue.component('paginate', Paginate)




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('header-component', require('./components/layout/headerview.vue').default);

Vue.component('footer-component', require('./components/layout/footerview.vue').default);





Vue.use(session, {
    router,
    store,
    api,
    sessionCheckInterval: 5000
})
Vue.use(VueSession);
const app = new Vue({
   // i18n,
    el: '#app',
    components: {
        App
    },
	/* created(){
        if (this.$store.getters.isAuthenticated) {
            this.$store.dispatch('userRequest');
        }
    }, */
    //store,
    router
});
