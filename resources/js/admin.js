// window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * jQuery and the Bootstrap jQuery plugin
 */
try {
  window.$ = window.jQuery = require('jquery');
  require('bootstrap');
} catch (e) {}

/**
 * Axios HTTP library
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * CSRF Token
 */
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * API Token
 */
let apiToken = document.head.querySelector('meta[name="api-token"]');

if (apiToken) {
  window.axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken.content}`;
} else {
  console.error('API token not found.');
}

/**
 * Vue
 */
import Vue from 'vue';
window.Vue = Vue;

/**
 * i18n
 */
import VueI18n from 'vue-i18n';
import fr from '../lang/fr.json';
import en from '../lang/en.json';
import es from '../lang/es.json';
const messages = { fr, en, es };
const i18n = new VueI18n({ locale: 'en', messages });

/**
 * Date Filter
 */
import date from './filters/Date.js';
Vue.filter('date', date);

/**
 * Lists
 */
import ItemListColumnHeader from './components/ItemListColumnHeader.vue';
import ItemList from './components/ItemList.vue';
import ItemListTree from './components/ItemListTree.vue';
import ItemListStatusButton from './components/ItemListStatusButton.vue';
import ItemListCheckbox from './components/ItemListCheckbox.vue';
import ItemListPositionInput from './components/ItemListPositionInput.vue';

/**
 * History
 */
import History from './components/History.vue';

/**
 * Files
 */
import Filepicker from './components/Filepicker.vue';
import Files from './components/Files.vue';
import FileField from './components/FileField.vue';

window.EventBus = new Vue({});

new Vue({
  i18n,
  components: {
    ItemListColumnHeader,
    ItemList,
    ItemListTree,
    ItemListStatusButton,
    ItemListCheckbox,
    ItemListPositionInput,
    Filepicker,
    Files,
    FileField,
    History,
  },
}).$mount('#app');

/**
 * Alertify
 */
window.alertify = require('alertify.js');

/**
 * Selectize
 */
require('selectize');

/**
 * All files in /reources/js/admin
 */
let req = require.context('./admin', true, /^(.*\.(js$))[^.]*$/im);
req.keys().forEach(function(key) {
  req(key);
});
