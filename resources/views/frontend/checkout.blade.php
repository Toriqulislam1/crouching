@extends('frontend.layout.front-layout')
@push('css')
@endpush
@section('content')
    <!--Start Contact Form-->
    <section class="contact-page pad-tb bg-gradient5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="niwax23form shadow">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="common-heading text-l">
                                    <h4 class="mt0 mb0">course: {{$package->short_title}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="common-heading text-l">
                                    <h4 class="mt0 mb0">{{$basic->currency}} {{number_format(round($package->final_price))}}</h4>
                                    <h5 class="mt0 mb0">#{{$orderSerial}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form-card-pr contact-block-sw m0 iconin">
                            <div class="form-block niwaxform">
                                <form action="{{route('submit-order')}}" id="contactform" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{$orderSerial}}">
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                    <input type="hidden" name="total_amount" value="{{number_format(round($package->final_price))}}">
                                    <div class="fieldsets row">
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-user"></i></div>
                                            <input type="text" placeholder=" " required="required" id="name" class="floating-input" name="name" value="{{$user->name}}">
                                            <label>Full Name*</label>
                                            <div class="error-label"></div>
                                        </div>
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-phone-alt"></i></div>
                                            <input type="tel" placeholder=" " required="required" id="phone" class="floating-input" name="phone" value="{{$user->phone}}">
                                            <label>Mobile Number*</label>
                                            <div class="error-label"></div>
                                        </div>
                                    </div>

                                    <div class="fieldsets row">
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-envelope"></i></div>
                                            <input type="email" placeholder=" " name="email" id="email" class="floating-input" readonly value="{{$user->email}}">
                                            <label>Email Address*</label>
                                            <div class="error-label"></div>
                                        </div>
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-map-marker-alt"></i></div>
                                            <input type="text" placeholder=" " required="required" id="address" class="floating-input" name="address" value="{{$user->address}}">
                                            <label>Address*</label>
                                            <div class="error-label"></div>
                                        </div>
                                    </div>
                                    <div class="fieldsets row">
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-users"></i></div>
                                            <input type="text" placeholder=" " required="required" name="page_url" id="email" class="floating-input">
                                            <label>Class*</label>

                                            <div class="error-label"></div>
                                        </div>
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-university"></i></div>
                                            <input type="text" placeholder=" " required="required" id="address" class="floating-input" name="post_url" >
                                            <label>Institute name*</label>
                                            <div class="error-label"></div>
                                        </div>
                                    </div>
                                    <div class="fieldsets row">
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-user"></i></i></div>
                                            <input type="text" placeholder="" required="required" name="platform" id="email" class="floating-input">
                                            <label>Parents Name*</label>
                                            <div class="error-label"></div>
                                        </div>
                                        <div class="col-md-6 form-group floating-label">
                                            <div class="formicon"><i class="fas fa-phone-alt"></i></div>
                                            <input type="text" placeholder=" " required="required" id="address2" class="floating-input" name="address2" >
                                            <label>Parents Mobile*</label>
                                            <div class="error-label"></div>
                                        </div>
                                    </div>
                                    <div class="fieldsets row">
                                        <div class="col-md-12 form-group floating-label">
                                            <label>Student photo*</label>
                                            <div class="formicon"><i class="fas fa-images"></i></div>
                                            <input type="file" placeholder="" name="image" id="" class="floating-input" >
                                            <div class="error-label"></div>
                                        </div>
                                    </div>
                                    <div class="fieldsets mt20"> <button type="submit" name="submit" class="btn btn-main bg-btn w-fit mb20"><span>Submit <i class="fas fa-chevron-right fa-icon"></i></span> <span class="loader"></span></button> </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Form-->

@endsection
@push('js')
@endpush
