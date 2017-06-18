<template>
	<div>
		<i class="fa fa-user"></i>
		<input type="text" class="search-box" v-model="query" v-on:keyup="findStudents">

		<ul class="student-list">
			<li class="student" v-for="student in students" v-bind:class="student.color" @click="setActiveHouse(student.house_id)">
				 {{student.name}} ( {{student.grade}} )
			</li>
		</ul>
	</div>
</template>

<script>
	export default {

		mounted() {
			this.$store.commit('setExitNeeded')
		},

		data() {
			return {
				students: [],
				query: ""
			};
		},

		methods: {
			findStudents() {
				axios.post('/api/students/search', {'query': this.query})
					.then((response) => {
						this.students = response.data.data
					})
			},

			setActiveHouse(house) {
				this.$store.commit('changeActiveHouse', house)
				this.$router.push('/')
			}
		}
	}
</script>
