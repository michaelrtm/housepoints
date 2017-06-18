<template>
  <div>
    <manage-houses></manage-houses>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$store.commit('setExitNeeded')
  }
}
</script>

<style lang="css">
</style>
