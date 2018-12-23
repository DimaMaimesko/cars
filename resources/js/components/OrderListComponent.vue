<template>
    <div class="container">
        <!-- Large modal -->
        <button @click="getOrders" type="button" class="btn btn-info" >Список заказов</button>
        <div id="ordersModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div  class="modal-dialog modal-lg">
                <div class="modal-content">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Пользователь</th>
                                <th>#</th>
                                <th>Город под.</th>
                                <th>Время под.</th>
                                <th>Город возв.</th>
                                <th>Время возв.</th>
                                <th>Сумма</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in orders">
                                <td>{{order.user.name}}</td>
                                <td>{{order.id}}</td>
                                <td>{{order.city_start.name}}</td>
                                <td>{{order.date_start}}</td>
                                <td>{{order.city_finish.name}}</td>
                                <td>{{order.date_finish}}</td>
                                <td>{{order.sum}}</td>
                                <td><button @click="delOrder(order.id)" type="button" class="close"><span aria-hidden="true">&times;</span></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button @click="delOrder"  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data: function () {
            return {
              orders: {},
            }
        },
        methods: {
            getOrders: function()  {
                axios({
                    method: 'get',
                    url:    '/get-orders',
                }).then((response) => {
                   this.orders = response.data[0];
                });
                $('#ordersModal').modal('show');
            },
            delOrder: function (orderId) {
                axios({
                    method: 'delete',
                    url:    '/del-order',
                    params: {'orderId': orderId}
                }).then((response) => {
                    this.orders = response.data[0];
                });
            }
        },
    }
</script>
