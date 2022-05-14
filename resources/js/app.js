require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Vue = require('vue')

// Vue.component('contact-component', require('./components/Contact.vue').default)

const app = Vue.createApp({})
