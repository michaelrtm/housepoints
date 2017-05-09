<template>
	<div>
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
						v-bind:class="currentlyActiveHouse.color"
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
		props: ['houses','activeHouse'],

		data() {
			return {
				setScores: [5,10,20,50]
			}
		},

		computed: {
			currentlyActiveHouse() {
				return this.activeHouse;
			}
		},

		methods: {
			setActiveHouse(house) {
				this.$emit('house-set', house.id);
				this.currentlyActiveHouse = house;
			},

			clearActiveHouse() {
				this.$emit('house-set', null);
				this.currentlyActiveHouse = null;
			},

			addScore(score) {
				axios.post('/api/scores', {score: score, house_id: this.activeHouse.id} )
					.then((response) => {
						this.$emit('scored', score)
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
