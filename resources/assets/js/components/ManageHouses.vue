<template>
    <div>
        <vk-tabs-vertical :index="tabIndex"
          @change="tabIndex = arguments[0]">
          <vk-tabs-item v-for="house in houses" :name="house.name">
            <div class="uk-panel">
                <div class="uk-panel-heading" :style="{ 'border-top-color': house.hex }">
                </div>
                <div class="uk-panel-body">
                    <div class="uk-margin">
                        <input class="uk-input" type="" name="" v-model="house.name">
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="" name="" v-model="house.color">
                    </div>
                    <div class="uk-margin">
                        <textarea rows="4" class="uk-textarea" v-model="house.blurb"></textarea>
                    </div>
                   
                </div>
                <div class="uk-panel-footer">
                    <button class="btn btn-default" @click="updateHouse(house)">Save</button>
                </div>
            </div>
          </vk-tabs-item>
        </vk-tabs-vertical>
         <color-picker></color-picker>
    </div>
</template>

<script>
    export default {
        computed: {
            houses() {
                return this.$store.getters.getHouses
            }
        },

        data() {
            return {
                tabIndex: 0
            }
        },

        methods: {
            updateHouse(house) {
                axios.put('/api/houses/' + house.id, {
                    'name': house.name,
                    'blurb': house.blurb,
                    'color': house.color,
                    'hex': house.hex.hex,
                })
                .then()
            }
        }
    }
</script>

<style>
    .list-group-item {
        border-left: 8px solid;
        margin-bottom:8px;
    }
</style>