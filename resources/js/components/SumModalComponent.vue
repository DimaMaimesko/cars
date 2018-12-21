<template>
    <div class="container">
        <div id="sumModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    ...
                </div>
                <button @click="showModal = false" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            showModal: false,
        },
        mounted() {
            console.log('Component mounted.')
        },
        watch:  {
            showModal: function () {
                $('#sumModal').modal('show');
                console.log("Hello");
            }
        }
    }

</script>
