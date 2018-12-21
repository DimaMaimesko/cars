@extends('layouts.app')

@section('content')
<div class="container">
    <cities-component :cities="{{json_encode($cities)}}"></cities-component>
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <order-form-component :cities="{{json_encode($cities)}}"></order-form-component>

                </div>
        </div>
    </div>
</div>
@endsection
