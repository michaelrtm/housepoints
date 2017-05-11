<script>
import { Bar } from 'vue-chartjs'

export default Bar.extend({

    mounted() {
      var self = this
      this.$store.watch(
        function(state) {
          return self.$store.getters.scores
        },
        function() {
          self.buildScores()
        },
        {
          deep: true,
          immediate: true
        })
    },

    data() {
      return {
        displayLabels: [],
        displayScores: [],
        displayColors: []
      }
    },

    computed: {
      scores() {
        return this.$store.state.scores
      }
    },

    methods: {
      buildScores() {
        if(this._chart){
          this._chart.destroy()
        }
        this.displayLabels = []
        this.displayColors = []
        this.displayScores = []

        var self = this
        _.forOwn(this.scores, function (object, index){
          self.displayLabels.push(object.name)
          self.displayColors.push(object.hex)
          self.displayScores.push(object.score)
        });
        this.render();
      },

      render() {
        this.renderChart({
          labels: this.displayLabels,
          datasets: [
            {
              label: 'House Points',
              backgroundColor: this.displayColors,
              data: this.displayScores
            }
          ]
        },{
          legend: {
            display: false
          },
          tooltips: {
            enabled: true
          },
          scales: {
            gridLines: {
              display: true
            },
            xAxes: [{
              categoryPercentage: 1,
              barPercentage: .9
            }]
          }
        });
      }
    }

  })
</script>
