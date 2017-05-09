<script>
import { Bar } from 'vue-chartjs'

export default Bar.extend({
    props: ['scores','toggle'],

    mounted () {

    },

    data() {
      return {
        displayLabels: [],
        displayScores: [],
        displayColors: []
      }
    },

    watch: {
      scores() {
        this.buildScores()
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
