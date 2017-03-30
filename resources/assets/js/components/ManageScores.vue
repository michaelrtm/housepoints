<template>
	<div>
		<div class="square-buttons">
			<transition enter-active-class="animated bounceIn"
    					leave-active-class="animated bounceOut"
						mode="out-in">
				<button class="btn-square bell"
						v-if="!activeHouse"
						@click="setActiveHouse('blue')"
						key="bell"
						>
					Bell
				</button>

				<button class="btn-square"
						v-bind:class="activeHouse"
						v-else
						@click="addScore(5)"
						key="plus5"
						>
					+5
				</button>
			</transition>

			<transition enter-active-class="animated bounceIn"
    					leave-active-class="animated bounceOut"
						mode="out-in">
				<button class="btn-square hookey"
						v-if="!activeHouse"
						@click="setActiveHouse('yellow')"
						key="hookey"
						>
					Hookey
				</button>

				<button class="btn-square"
						v-bind:class="activeHouse"
						v-else
						@click="addScore(10)"
						key="plus10"
						>
					+10
				</button>
			</transition>

			<transition enter-active-class="animated bounceIn"
    					leave-active-class="animated bounceOut"
						mode="out-in">
				<button class="btn-square walling"
						v-if="!activeHouse"
						@click="setActiveHouse('green')"
						key="walling"
						>
					Walling
				</button>

				<button class="btn-square"
						v-bind:class="activeHouse"
					v-else
					@click="addScore(20)"
					key="plus20"
					>
					+20
				</button>
			</transition>

			<transition enter-active-class="animated bounceIn"
    					leave-active-class="animated bounceOut"
						mode="out-in">
				<button class="btn-square jamieson"
						v-if="!activeHouse"
						@click="setActiveHouse('red')"
						key="jamieson"
						>
					Jamieson
				</button>

				<button class="btn-square"
						v-bind:class="activeHouse"
						v-else
						@click="addScore(50)"
						key="plus50"
						>
					+50
				</button>
			</transition>
		</div>	
	</div>
</template>

<script>
	export default {
		props: ['activeHouse'],

		data() {
			return {
				//
			}
		},

		computed: {
			currentlyActiveHouse() {
				return this.activeHouse;
			}
		},

		methods: {
			setActiveHouse(house) {
				this.$emit('house-set', house);
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