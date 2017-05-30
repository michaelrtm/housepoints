
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import Vuex from 'vuex';

Vue.use(VueRouter);
Vue.use(Vuex);

import { routes } from './router.js';
const router = new VueRouter({ routes });

const store = new Vuex.Store({
  state: {
    activeHouse: null,
    findStudent: null,
    students: null,
    houses: {},
    scores: null,
  },
  mutations: {
    setHouses (state, houses) {
      state.houses = houses
    },
    changeActiveHouse (state, house) {
      var house_obj = _.find(state.houses, { id: house })
      state.activeHouse = house_obj
    },
    changeScores (state, scores) {
      state.scores = scores
    },
    addScore (state, data) {
      var house = _.findKey(state.scores, { 'id': data.house_id })
      state.scores[house].score += data.score
    }
  },
  getters: {
    scores: state => {
      return state.scores
    },
    getActiveHouse: state => {
      return state.activeHouse
    },
    getHouses: state => {
      return state.houses
    }
  }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('exit-button', require('./components/ExitButton.vue'))
Vue.component('scores-bar-chart', require('./components/ScoresBarChart.vue'))
Vue.component('link-button', require('./components/Button.vue'));
Vue.component('manage-scores', require('./components/ManageScores.vue'));
Vue.component('find-student', require('./components/FindStudent.vue'));

import { Bar } from 'vue-chartjs';

const app = new Vue({
    store,
    router,

    mounted() {
        // this.getHouses();
        // this.getStudents();
    },

    computed: {
        houseOrStudentActive() {
            this.activeHouse;
            this.findStudent;
            return this.activeHouse || this.findStudent;
        },
        exitNeeded() {
          //test to see if exit is needed
        }
    },

    data() {
    	return {

        }
    },

    methods: {

        scored() {

        },
        //
        // activeHouseSet(house) {
        //     this.findStudent = false;
        //     this.activeHouse = this.houses[house - 1];
        // },
        //
        clearAll() {
            this.findStudent = null,
            this.activeHouse = null
        }

    }
}).$mount('#app')
