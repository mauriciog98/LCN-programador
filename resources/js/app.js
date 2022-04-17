/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { createApp } from "vue"
window.Vue = require('vue')

import App from './components/App.vue'
import {createI18n} from 'vue-i18n'
import VueAxios from 'vue-axios'
import axios from 'axios'
import router from './router'
import messages from './messages'


// 2. Create i18n instance with options
const i18n = createI18n({
    locale: 'es', // set locale
    fallbackLocale: 'en', // set fallback locale
    messages, // set locale messages
    // If you need to specify other options, you can set other options
    // ...
})


const app = createApp(App)
app.use(i18n)
app.use(router)
app.use(VueAxios,axios)
app.mount('#app')
