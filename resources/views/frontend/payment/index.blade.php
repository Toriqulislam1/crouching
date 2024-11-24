
@extends('frontend.layout.front-layout')
@push('css')
@endpush
@section('content')





<section class="clients-section pad-tb" id="client">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading">
                    <h2>Our Payment available now</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="opl">
                    <ul>
                        @foreach ($bkashData as $bkashItem)
                        <li class="wow fadeIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                            <div class="clients-logo">
                                <a href="{{ route('bkash-payment-form',$orderId) }}">
                                    <img src="{{ asset('public/upload/payment') }}/{{ $bkashItem->bkash_image  }}" alt="text" class="img-fluid">
                                </a>
                            </div>
                        </li>
                        @endforeach
                        <li class="wow fadeIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                            <div class="clients-logo">
                                <a href="{{ route('nagad-payment-form',$orderId) }}">
                                    <img src="{{ asset('public/upload/payment') }}/{{ $nagadData->nagad_image  }}" alt="text" class="img-fluid">
                                </a>
                            </div>
                        </li>
                        <li class="wow fadeIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                            <div class="clients-logo">
                                <a href="{{ route('bank-payment-form',$orderId) }}">
                                    <img src="{{ asset('public/upload/payment') }}/{{ $bankData->bank_image  }}" alt="text" class="img-fluid">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('js')
@endpush
