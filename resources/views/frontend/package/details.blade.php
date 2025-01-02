@extends('frontend.layout.front-layout')
@push('css')
@endpush
@section('content')
<!--Start Contact Form-->
<section class="service pad-tb bg-gradient5">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-4">
                <div class="image-block wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <img src="images/service/digitalmarketing.png" alt="image" class="img-fluid no-shadow">
                </div>
            </div> --}}
            <div class="col-lg-12 block-1">
                <div class="common-heading text-l pl25">
                    <span>Overview</span>
                    <h2>{{$packageInfo->short_title}}</h2>
                    <p>{{$packageInfo->details}} </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End Contact Form-->

@endsection
@push('js')
@endpush

