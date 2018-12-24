<template>
    <div>
        <select v-model="chosenCurrency" @change="currencyChanged">
            <option disabled value="">Валюта</option>
            <option :value="currency" v-for="currency in currencies">{{currency.name}}</option>
        </select>
    </div>
</template>

<script>
    import  {eventBus} from "../app";

    export default {

        props: {
            currencies: {},
        },

        data: function () {
            return {
                chosenCurrency: this.currencies[0],
            }
        },

        methods: {
            currencyChanged: function(){
                console.log(this.chosenCurrency);
                eventBus.$emit('currencyChanged', this.chosenCurrency)
            }
        },
        mounted() {
            console.log(this.chosenCurrency);
            eventBus.$emit('currencyChanged', this.chosenCurrency)
        },


    }
</script>
