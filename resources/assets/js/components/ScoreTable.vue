<template lang="html">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th></th>
        <th style="width:20%" v-for="score in lastWeekScores">@{{ score.name }}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>This Week</td>
        <td style="width:20%" v-for="score in scores">@{{ score.score }}</td>
      </tr>
      <tr>
        <td>Last Week</td>
        <td style="width:20%" v-for="score in lastWeekScores">@{{ score.score }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
