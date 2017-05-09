
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
        this.getStudents();
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
            displayLabels: [],
            displayScores: [],
            displayColors: [],
            activeHouse: null,
            findStudent: null,
            viewTable: false,
            students: null,
            houses: {},
            scores: null,
            lastWeekScores: null,
            week: true,
            year: false
        }
    },

    methods: {
        getScores() {
            var self = this;
            axios.get('/api/calculate')
                .then((response) => {
                    this.scores = response.data.data
                })
            axios.get('/api/calculate?scope=last-week')
                .then((response) => {
                    this.lastWeekScores = response.data.data
                })
        },

        getHouses() {
            axios.get('/api/houses')
                .then((response) => {
                    this.houses = response.data.data
                })
        },

        getStudents() {
          axios.get('/api/students')
            .then((response) => {
              this.students = response.data.data
            })
        },

        scoreAdded(score) {
            this.getScores();
            this.year = false
            this.week = true
        },

        activeHouseSet(house) {
            this.findStudent = false;
            this.activeHouse = this.houses[house - 1];
        },

        viewYearlyScores() {
            this.year = true
            this.week = false
            axios.get('/api/calculate?scope=year')
                .then((response) => {
                    this.scores = response.data.data
                })
        },

        viewWeeklyScores() {
            this.year = false
            this.week = true
            axios.get('/api/calculate')
                .then((response) => {
                    this.scores = response.data.data
                })
        },

        clearAll() {
            this.findStudent = null,
            this.activeHouse = null
        }

    }
});
