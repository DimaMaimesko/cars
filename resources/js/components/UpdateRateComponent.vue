<template>
    <div class="ml-3  d-flex row">
        <button @click="updateRate" type="button" class="btn btn-info" >Обновить курс валют</button>
        <p>{{currencies[0]['conversion']}}{{currencies[0]['sign']}}={{currencies[1]['conversion']}}{{currencies[1]['sign']}}({{currencies[1]['updated_at']}})</p>
    </div>
</template>

<script>
    export default {
        props: {
            currencies: {},
        },
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
