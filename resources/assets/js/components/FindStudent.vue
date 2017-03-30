<template>
	<div>
		<i class="fa fa-user"></i>
		<input type="text" v-model="query">

		<ul class="student-list">
			<li class="student" v-bind:class="student.house" v-for="student in computedList" @click="setActiveHouse(student.house)">
				 {{student.name}} ( {{student.grade}} )
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		props: ['students'],

		data() {
			return {
				query: ""
			};
		},

		computed: {
			computedList: function () {
		      var vm = this
		      return this.students.filter(function (item) {
		        return item.name.toLowerCase().indexOf(vm.query.toLowerCase()) !== -1
		      })
		    }
		},

		methods: {
			setActiveHouse(house) {
				this.$emit('active-house-set', house);
			}
		}
	}
</script>