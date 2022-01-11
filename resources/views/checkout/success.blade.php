@extends('layouts.app')
@section('content')
	<section class="checkout">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('images/ill_register.png')}}" class="mb-5 image-checkout" alt="">
                </div>
                <div class="col-md-6 col-12 header-wrap" style="margin-top: 6rem">
                    <p class="story">
                        WHAT A DAY!
                    </p>
                    <h2 class="primary-header">
                        Berhasil Checkout
                    </h2>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
                        My Dashboard
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection