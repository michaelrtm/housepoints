<script>
import { Bar } from 'vue-chartjs';

export default Bar.extend({
    props: ['scores'],
    
    mounted () {
        console.log(this.scores)
        this.sortScores()
        this.render()
    },

    /*watch: {
      'sortedScores': {
        handler: function() {
          this.render()
        },
        deep: true
      }
    },

    computed: {
      sortedScores() {
        return [this.scores.red, this.scores.green, this.scores.yellow, this.scores.blue];
      }
    },*/

    data() {
      return {
        displayScores: [],
        displayLabels: [],
        displayColors: []
      };
    },

    methods: {
      sortScores() {
        console.log("sorting scores")
        console.log(this.scores)
        $.each(this.scores, function(object) {
            $.each(object, function(key, value) {
                console.log( key + ": " + value );
            });
        });
      },

      render() {
        this.renderChart({
          labels: this.displayLabels,
          datasets: [
            {
              backgroundColor: '#f87979',
              data: this.displayScores,
              backgroundColor: this.displayColors,
              borderWidth: 2,
            }
          ]},
          {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
              display: false
            },
            scales: {
              xAxes: [{
                barPercentage: .9,
                columnPercentage: 1,
              }]
            }
          }
      );
      }
    }

  })
</script>
