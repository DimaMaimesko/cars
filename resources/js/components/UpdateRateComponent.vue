<template>

        <button @click="updateRate" type="button" class="btn btn-info" >Обновить курс валют</button>

</template>

<script>
    export default {
        data: function () {
            return {

            }
        },
        methods: {
            updateRate: function()  {
                axios({
                    method: 'put',
                    url:    '/update-currency',
                }).then((response) => {
                    console.log(response.data);
                });
            },
        },
    }
</script>
