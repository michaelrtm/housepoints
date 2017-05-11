<template lang="html">
  <div class="">
      <scores-bar-chart :height="288"></scores-bar-chart>
      <div class="square-buttons">
				<button class="btn-square grey half" @click="viewWeeklyScores()" v-bind:class="{ active: week }"><i class="fa fa-trophy"></i> Week</button>
				<button class="btn-square grey half" @click="viewYearlyScores()" v-bind:class="{ active: year }"><i class="fa fa-trophy"></i> Year</button>
			</div>
  </div>

</template>

<script>
export default {

  mounted() {
    this.getScores()
  },

  data() {
    return {
      week: true,
      year: false
    }
  },

  methods:{
    getScores() {
        var self = this;
        axios.get('/api/calculate')
            .then((response) => {
                this.$store.commit('changeScores', response.data.data)
            })
        axios.get('/api/calculate?scope=last-week')
            .then((response) => {
                this.lastWeekScores = response.data.data
            })
    },

    viewYearlyScores() {
        this.year = !this.year
        this.week = !this.week
        axios.get('/api/calculate?scope=year')
            .then((response) => {
                this.$store.commit('changeScores', response.data.data)
            })
    },

    viewWeeklyScores() {
        this.year = !this.year
        this.week = !this.week
        axios.get('/api/calculate')
            .then((response) => {
                this.$store.commit('changeScores', response.data.data)
            })
    },

  }

}
</script>

<style lang="css">
</style>
