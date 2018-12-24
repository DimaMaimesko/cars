<template>
    <div class="ml-3  d-flex row">
        <button @click="updateRate" type="button" class="btn btn-info" >Обновить курс валют</button>
        <p style="color: #00b3ee">1$ = {{rate}}₴ ({{updated_at}})</p>
    </div>
</template>

<script>
    export default {

        data: function () {
            return {
              rate: '',
              updated_at: '',
            }
        },
        mounted() {
            this.updateRate();
        },
        methods: {
            updateRate: function()  {
                axios({
                    method: 'put',
                    url:    '/update-currency',
                }).then((response) => {
                    this.rate = response.data.rate;
                    this.updated_at = response.data.updated_at.date;
                    console.log(this.rate);
                    console.log(this.updated_at.date);
                });
            },

        },
    }
</script>
