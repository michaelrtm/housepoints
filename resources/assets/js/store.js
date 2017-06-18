module.exports = {
  state: {
    exitNeeded: false,
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
    setExitNeeded (state) {
      state.exitNeeded = !state.exitNeeded
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
    },
    getExitNeeded: state => {
      return state.exitNeeded
    },
  }
}