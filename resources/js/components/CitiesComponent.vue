<template>
        <select v-model="chosenCity" @change="cityChanged">
            <option disabled value="">Ваш город</option>
            <option :value="city" v-for="city in cities">{{city.name}}</option>
        </select>

</template>

<script>
    import  {eventBus} from "../app";

    export default {

        props: {
            cities: {},
        },

        data: function () {
            return {
                chosenCity: this.cities[0],
            }
        },

        methods: {
            cityChanged: function(){
                console.log(this.chosenCity);
                eventBus.$emit('cityChanged', this.chosenCity)
            }
        },
        mounted() {
            console.log(this.chosenCity);
            eventBus.$emit('cityChanged', this.chosenCity)
        },


    }
</script>
