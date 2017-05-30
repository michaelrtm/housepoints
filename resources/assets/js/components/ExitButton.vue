<template lang="html">
  <transition enter-active-class="animated bounceIn"
          leave-active-class="animated bounceOut"
          >
    <button class="btn cancel" @click="exit">
      <i class="fa fa-times"></i>
    </button>
  </transition>
</template>

<script>
export default {
  methods: {
    exit() {
      this.$router.push('/')
    }
  }
}
</script>
