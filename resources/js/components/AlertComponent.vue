<template>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul v-for="message in messages">
            <li>{{message}}</li>
        </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
          messages: {},
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
