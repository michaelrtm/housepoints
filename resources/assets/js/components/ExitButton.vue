<template lang="html">
  <transition enter-active-class="animated bounceIn"
          leave-active-class="animated bounceOut"
          >
    <button @click="exit">
      <i class="fa fa-times"></i>
    </button>
  </transition>
</template>

<script>
export default {
  methods: {
    exit() {
      this.$store.commit('setExitNeeded')
      this.$store.commit('changeActiveHouse', null)
      this.$router.push('/')
    }
  }
}
</script>
