
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('house-points', require('./components/HousePoints.vue'));
Vue.component('link-button', require('./components/Button.vue'));
Vue.component('manage-scores', require('./components/ManageScores.vue'));
Vue.component('find-student', require('./components/FindStudent.vue'));

import { Bar } from 'vue-chartjs';

const app = new Vue({
    el: '#app',

    mounted() {
        this.getHouses();
        this.getScores();
    },

    computed: {
        houseOrStudentActive() {
            this.activeHouse;
            this.findStudent;
            return this.activeHouse || this.findStudent;
        }
    },

    data() {
    	return {
            activeHouse: null,
            findStudent: null,
            houses: {},
            scores: {}
        }
    },

    methods: {
        getScores() {
            axios.get('/api/calculate')
                .then((response) => {
                    this.scores = response.data
                })
        },

        getHouses() {
            axios.get('/api/houses')
                .then((response) => {
                    this.houses = response.data
                })
        },

        scoreAdded(score) {
            this.scores[this.activeHouse]+= score;
        },

        activeHouseSet(house) {
            this.findStudent = false;
            this.activeHouse = house;
        },

        viewYearlyScores() {
            axios.get('/api/calculate?scope=year')
                .then((response) => {
                    this.scores = response.data
                })
        },

        viewWeeklyScores() {
            axios.get('/api/calculate')
                .then((response) => {
                    this.scores = response.data
                })
        },

        clearAll() {
            this.findStudent = null,
            this.activeHouse = null
        }
    }
});


