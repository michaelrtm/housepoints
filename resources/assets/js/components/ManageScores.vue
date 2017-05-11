<template>
	<div>
		<div class="square-buttons">
			<router-link to="/search" class="btn-square grey wide" tag="button"><i class="fa fa-user"></i> Find Student</router-link>
		</div>

		<div class="square-buttons">

			<transition enter-active-class="animated bounceIn"
				v-for="(house, index) in houses"
				leave-active-class="animated bounceOut"
				mode="out-in">

				<button class="btn-square"
						v-if="!activeHouse"
						@click="setActiveHouse(house)"
						key="house.name"
						v-bind:class="house.color"
						>
					{{ house.name }}
				</button>

				<button class="btn-square"
						v-bind:class="activeHouse.color"
						v-else
						@click="addScore(setScores[index])"
						key="plus"
						>
					+ {{ setScores[index] }}
				</button>
			</transition>

		</div>
	</div>
</template>

<script>
	export default {

		mounted() {
			this.getHouses()
		},

		data() {
			return {
				setScores: [5,10,20,50]
			}
		},

		computed: {
			activeHouse() {
				return this.$store.getters.getActiveHouse
			},
			houses() {
				return this.$store.getters.getHouses
			}
		},

		methods: {
			getHouses() {
				axios.get('/api/houses')
				  .then((response) => {
						this.$store.commit('setHouses', response.data.data)
			    })
			},

			setActiveHouse(house) {
				this.$store.commit('changeActiveHouse', house.id)
			},

			clearActiveHouse() {
				this.$store.commit('changeActiveHouse', null)
			},

			addScore(score) {
				axios.post('/api/scores', {score: score, house_id: this.activeHouse.id} )
					.then((response) => {
						this.$store.commit('addScore', {score: score, house_id: this.activeHouse.id})
						this.clearActiveHouse()
					})
					.catch((response) => {
						console.log('mistake')
						console.log(response)
					})
			}
		}
	}
</script>
