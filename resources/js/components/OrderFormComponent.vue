<template>
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-10" style="width: 18rem;">

                        <h4 >Подобрать автомобиль</h4>

                        <div id="sumModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="alert-success">
                                        <br><br>
                                        <h4 class="alert-success text-center">Сумма Вашего заказа #{{orderParams.order}}</h4>
                                        <h4 class="alert-success text-center">{{orderParams.sum * currency.conversion/100}}<strong>{{currency.sign}}</strong></h4>
                                        <br><br>
                                   </div>
                                   <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                        <alert-component :messages="validationMessages" v-show="showAlert"></alert-component>

                        <div @click="showAlert = false">
                            <p class="text-left">Выдача</p>
                            <select v-model="cityStart" @change="cityStartChanged">
                                <option disabled value="">Выберете место подачи</option>
                                <option :value="city" v-for="city in cities">{{city.name}}</option>
                            </select>

                            <div class="d-flex justify-content-center">
                                <datepicker :disabled-dates="disabledDatesStart" v-model="dateStart" @closed="dateStartChanged"></datepicker>
                                <vue-timepicker v-model="timeStart" @change="timeStartChanged" :hide-clear-button="true"></vue-timepicker>
                            </div>
                        </div>

                        <div @click="showAlert = false">
                            <p class="text-left">Возврат</p>
                            <select v-model="cityFinish">
                                <option disabled value="">Выберете место возврата</option>
                                <option :value="city" v-for="city in cities">{{city.name}}</option>
                            </select>

                            <div class="d-flex justify-content-center">
                                <datepicker :disabled-dates="disabledDatesFinish" v-model="dateFinish" ></datepicker>
                                <vue-timepicker v-model="timeFinish" @change="timeFinishChanged" :hide-clear-button="true"></vue-timepicker>
                            </div>
                        </div>

                        <button @click="sendForm" class="btn btn-danger">Выбрать</button>
                    {{10000 * currency.conversion/100}}<strong>{{currency.sign}}</strong>
                </div>
        </div>
    </div>

</template>

<script>

    import Datepicker from 'vuejs-datepicker';
    import VueTimepicker from 'vue2-timepicker';
    import  {eventBus} from "../app";

    let curDate = new Date();
    export default {
        components: {
            Datepicker,
            VueTimepicker,
        },
        props: {
            cities: {},
        },

        data: function () {
            return {
                cityStart: {},
                cityFinish: {},
                timeStart: {
                    HH: curDate.getHours(),
                    mm: curDate.getMinutes(),
                },
                timeFinish: {
                    HH: curDate.getHours(),
                    mm: curDate.getMinutes(),
                },

                dateStart: new Date(),
                disabledDatesStart: {
                    to: new Date(curDate.getFullYear(),curDate.getMonth(),curDate.getDate())
                },
                dateFinish: new Date(),
                disabledDatesFinish: {
                    to: new Date(curDate.getFullYear(),curDate.getMonth(),curDate.getDate())
                },
                validationMessages: [],
                showAlert: false,
                orderParams: {},
                currency: {},
            }
        },
        created() {
            eventBus.$on('cityChanged', (data) => {
                this.cityStart = data;
                this.cityFinish = data;
            });
            eventBus.$on('currencyChanged', (data) => {
                this.currency = data;
            })
        },
        mounted() {


        },
        methods:  {

            cityStartChanged: function () {
                this.cityFinish = this.cityStart;
            },

            dateStartChanged: function () {
                 this.dateFinish = new Date(this.dateStart.getFullYear(),this.dateStart.getMonth(),this.dateStart.getDate());
                 this.disabledDatesFinish.to = new Date(this.dateStart.getFullYear(),this.dateStart.getMonth(),this.dateStart.getDate());
            },

            timeStartChanged: function () {
                let curDate = new Date();
                if((curDate.getFullYear() === this.dateStart.getFullYear())&&
                    (curDate.getMonth()   === this.dateStart.getMonth())&&
                    (curDate.getDate()    === this.dateStart.getDate())){
                    if (this.timeStart.HH > this.timeFinish.HH){
                        this.timeFinish = this.timeStart;
                    }
                    if ((this.timeStart.HH == this.timeFinish.HH)&&(this.timeStart.mm > this.timeFinish.mm)){
                        this.timeFinish = this.timeStart;
                    }
                    if ((this.timeStart.HH < curDate.getHours())
                        || ((this.timeStart.HH == curDate.getHours()) && (this.timeStart.mm < curDate.getMinutes()))){
                        alert('Время подачи должно быть больше текущего времени! Сейчас '+ curDate.getHours() + ":" + curDate.getMinutes());
                    }
                }
            },

            timeFinishChanged: function () {
                if((this.dateStart.getFullYear() === this.dateFinish.getFullYear())&&
                    (this.dateStart.getMonth()   === this.dateFinish.getMonth())&&
                    (this.dateStart.getDate()    === this.dateFinish.getDate())){
                    if ((this.timeFinish.HH < this.timeStart.HH)
                        || ((this.timeFinish.HH == this.timeStart.HH) && (this.timeFinish.mm < this.timeStart.mm))){
                        alert('Время возврата должно быть больше времени подачи! Время подачи '+ this.timeStart.HH + ":" + this.timeStart.mm);
                    }
                }
            },
            sendForm:  function() {
                if(this.validateForm())
                {
                    this.orderParams = {cityStart:  this.cityStart.id,
                                        cityFinish: this.cityFinish.id,
                                        dateStart:  this.dateStart,
                                        dateFinish: this.dateFinish,
                                        timeStart:  this.timeStart,
                                        timeFinish: this.timeFinish,
                                        sum: '',
                                        order: '',
                                       };
                    this.orderParams.sum = String(this.sumCalculate(this.orderParams));
                    let params = this.orderParams;

                    params.dateStart.setHours(this.timeStart.HH);
                    params.dateFinish.setHours(this.timeFinish.HH);
                    params.dateStart.setMinutes(this.timeStart.mm);
                    params.dateFinish.setMinutes(this.timeFinish.mm);
                    params.dateStart = params.dateStart.getTime();
                    params.dateFinish = params.dateFinish.getTime();
                    axios({
                        method: 'post',
                        url:    '/save',
                        params: {params}
                        }).then((response) => {
                            this.orderParams.order = response.data.order;
                        console.log('Data: '+(response.data.order));

                    });

                    $('#sumModal').modal('show');
                }
            },

            sumCalculate: (params)=> {
                let tarif = 3500;
                let oneWay = 2000;
                if (params.cityStart === params.cityFinish){
                    oneWay = 0;
                }

                params.dateStart.setHours(params.timeStart.HH);
                params.dateStart.setMinutes(params.timeStart.mm);
                params.dateStart.setSeconds(0);

                params.dateFinish.setHours(params.timeFinish.HH);
                params.dateFinish.setMinutes(params.timeFinish.mm);
                params.dateFinish.setSeconds(0);

                let minutes = (params.dateFinish.getTime() - params.dateStart.getTime())/60000;
                let  DAY = 1440;
                if(minutes >= 1*DAY && minutes < 4*DAY ){
                    tarif = 3500;
                }else
                    if(minutes >= 4*DAY && minutes < 7*DAY ){
                        tarif = 3300;
                    }else
                        if(minutes >= 7*DAY && minutes < 14*DAY ){
                            tarif = 3000;
                        }else
                            if(minutes >= 14*DAY && minutes < 30*DAY ){
                                tarif = 2800;
                            }else
                                if(minutes >= 31*DAY){
                                    tarif = 2400;
                                };
                let fullDays = Math.ceil(minutes / DAY);
                let sum = fullDays * tarif + oneWay;
                return sum;
            },

            isEmptyObject: (objectInput)=> {
              for ( name in objectInput) {
                return false;
              }
              return true;
            },

            validateForm: function() {
                this.validationMessages = [];
                this.showAlert = false;
                if (this.isEmptyObject(this.cityStart)) {
                    this.showAlert = true;
                    this.validationMessages.push('Выберете город подачи')
                };
                if(this.isEmptyObject(this.cityFinish)) {
                    this.showAlert = true;
                    this.validationMessages.push('Выберете город прибытия');
                };
                if (this.showAlert){
                    return false;
                }else{
                    this.showAlert = false;
                    return true;
                }

            },

        },
    }
</script>
