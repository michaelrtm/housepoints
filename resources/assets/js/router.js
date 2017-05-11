module.exports = {
    routes: [
        {
          path: '/',
          components: {
            default: require('./components/ManageScores.vue'),
            secondary: require('./components/ScoresMainView.vue')
          }
        },
        {
          path: '/search',
          components: {
            default: require('./components/FindStudent.vue'),
            secondary: require('./components/ScoresMainView.vue')
          }
        },
        {
          path: '/settings',
          components: {
            default: require('./components/Settings.vue'),
            secondary: require('./components/ScoresMainView.vue')
          }
        }
    ]
};
