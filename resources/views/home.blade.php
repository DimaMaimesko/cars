@extends('layouts.app')

@section('content')
<div class="container">

    <cities-component :cities="{{json_encode($cities)}}"></cities-component>

    <currency-component :currencies="{{json_encode($currencies)}}"></currency-component>

    <order-list-component></order-list-component>

    <div class="row justify-content-center">
        <div class="col-md-10">
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <order-form-component :cities="{{json_encode($cities)}}"></order-form-component>

                </div>
        </div>
    </div>
</div>
@endsection
