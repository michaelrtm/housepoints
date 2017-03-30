<template>
	<li class="main-button button-animate"
	    @click="redirect(link.href)">
		<img src="http://placehold.it/100x100">
		<!-- <img src="/img/45sdbxd.jpg"> -->
	</li>
</template>

<script>
	export default {
		props: ['link'],

		methods: {
			redirect(url) {
				//if url has http or www
				window.location.href = url
			}
		}
	}
</script>