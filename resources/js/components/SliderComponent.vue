<template>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-50" src="https://s3.amazonaws.com/findme77/1544750612_1327-r-thumb.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" src="https://s3.amazonaws.com/findme77/1544750691_su2su2lk-720.jpg-thumb.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" src="https://s3.amazonaws.com/findme77/1544751181_The_Earth_seen_from_Apollo_17-thumb.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">-->
            <!--<h1>sssssssssssssssssssss</h1>-->
            <!--<div class="carousel-inner">-->
                <!--<div class="carousel-item active">-->
                    <!--<img class="d-block w-100" src="https://s3.amazonaws.com/findme77/1544750612_1327-r-thumb.jpg" alt="Second slide">-->
                <!--</div>-->
                <!--<div class="carousel-item">-->
                    <!--<img class="d-block w-100" src="https://s3.amazonaws.com/findme77/1544750691_su2su2lk-720.jpg-thumb.jpg" alt="Second slide">-->

                <!--</div>-->
                <!--<div class="carousel-item">-->
                    <!--<img class="d-block w-100" src="https://s3.amazonaws.com/findme77/1544751181_The_Earth_seen_from_Apollo_17-thumb.jpg" alt="Second slide">-->

                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</template>

<script>


    export default {

        props: {

        },

        data: function () {
            return {

            }
        },

        methods: {

        },
        mounted() {
            $('.carousel').carousel();
        }


    }
</script>
