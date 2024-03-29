@extends('layouts.app')
@section('content')
		<section class="dashboard my-2">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                @include('components.alert')
                <table class="table">
                    <tbody>
                        @foreach ($checkouts as $checkout)
                            <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{ $checkout->camp->title  }}</strong>
                                </p>
                                <p>
                                    {{ $checkout->created_at->format('F d, Y') }}
                                </p>
                            </td>
                            <td>
                                <strong>Rp. {{ $checkout->camp->price }}.000</strong>
                            </td>
                            <td>
                                @if ( $checkout->is_paid )
                                    <strong class="text-success">Payment Success</strong>
                                @else
                                    <strong>Waiting for Payment</strong>
                                @endif
                            </td>
                            <td>
                                <a href="https://wa.me/628xxxxxxxxxx?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->camp->title }}" target="_blank" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
