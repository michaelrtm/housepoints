
/**
 * Get all the dependencies
 * To line 36 needs cleaning up
 */
require('./bootstrap');

import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Swatches from 'vue-color'
import Bar from 'vue-chartjs';

Vue.use(VueRouter);
Vue.use(Vuex);

/**
 * Import routes
 */
import { routes } from './router.js';
const router = new VueRouter({ routes });

/**
 * Import the store
 */
import { state } from './store.js';
const store = new Vuex.Store({ state });

/**
 * Setup all the components
 */
Vue.component('exit-button', require('./components/ExitButton.vue'))
Vue.component('scores-bar-chart', require('./components/ScoresBarChart.vue'))
Vue.component('link-button', require('./components/Button.vue'));
Vue.component('manage-scores', require('./components/ManageScores.vue'));
Vue.component('find-student', require('./components/FindStudent.vue'));
Vue.component('manage-houses', require('./components/ManageHouses.vue'));
Vue.component('color-picker', Swatches);

/**
 * Startup the app!
 */
const app = new Vue({
    store,
    router,

   mounted() {
      //
    },

    computed: {
        houseOrStudentActive() {
            this.activeHouse;
            this.findStudent;
            return this.activeHouse || this.findStudent;
        },
        exitNeeded() {
          return this.$store.getters.getExitNeeded;
        }
    },

    data() {
    	return {
          //
        }
    },

    methods: {
        clearAll() {
            this.findStudent = null,
            this.activeHouse = null
        }
    }
}).$mount('#app')
