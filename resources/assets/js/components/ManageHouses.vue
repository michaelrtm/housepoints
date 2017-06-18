<template>
    <div>
        <div class="house panel" v-for="house in houses">
            <div class="panel-heading" :style="{ 'border-top-color': house.hex }">
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input class="form-control" type="" name="" v-model="house.name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="" name="" v-model="house.color">
                </div>
                <div class="form-group">
                    <textarea rows="4" class="form-control" v-model="house.blurb"></textarea>
                </div>
                <div class="form-group">
                    <color-picker v-model="house.hex"></color-picker>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-default" @click="updateHouse(house)">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            houses() {
                return this.$store.getters.getHouses
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