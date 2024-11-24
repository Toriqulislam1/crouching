@extends('frontend.layout.front-layout')
@push('css')
@endpush
@section('content')
    <!--Start Service-->
    <section class="dg-service2 pad-tb" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="common-heading text-center">
                        <span class="text-effect-2">Our Best Services</span>
                        <h2 class="mb30">Why Should You Use Niwax Payment Service?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-3 col-sm-6 mt30 wow fadeIn niwax" data-wow-delay=".2s"  data-rellax-speed=".5" data-rellax-percentage=".5">
                    <div class="s-block text-l hoverwithbg up-hor animation">
                        <div class="nx-circl-icon nxlp-a"> <img src="{{asset('public/frontend')}}/images/icons/integration.png" alt="icon"> </div>
                        <h4><a href="#">Easy Integration</a></h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">More Details</a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mt30 wow fadeIn niwax" data-wow-delay=".2s" data-rellax-speed="-.5" data-rellax-percentage=".5">
                    <div class="s-block text-l hoverwithbg up-hor animation">
                        <div class="nx-circl-icon nxlp-b"> <img src="{{asset('public/frontend')}}/images/icons/integration.png" alt="icon"> </div>
                        <h4><a href="#">Rate of Transaction</a></h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">More Details</a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mt30 wow fadeIn niwax" data-wow-delay=".2s" data-rellax-speed=".5" data-rellax-percentage=".5">
                    <div class="s-block text-l hoverwithbg up-hor animation">
                        <div class="nx-circl-icon nxlp-c"> <img src="{{asset('ublic/frontend')}}/images/icons/integration.png" alt="icon"> </div>
                        <h4><a href="#">Payment Process</a></h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">More Details</a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mt30 wow fadeIn niwax" data-wow-delay=".2s" data-rellax-speed="-.5" data-rellax-percentage=".5">
                    <div class="s-block text-l hoverwithbg up-hor animation">
                        <div class="nx-circl-icon nxlp-d"> <img src="{{asset('public/frontend')}}/images/icons/integration.png" alt="icon"> </div>
                        <h4><a href="#">Text Invoice</a></h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#">More Details</a>
                    </div>
                </div>



            </div>

            <div class="-cta-btn mt70">
                <div class="free-cta-title v-center wow zoomInDown" data-wow-delay=".9s">
                    <p>Create Your Own<span> Payment Getway </span> Service</p>
                    <a href="#" class="niwax-btn2">Get Started<i class="fas fa-chevron-right fa-icon"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--End Service-->

    <!-- company awards icons -->
    <div class="niwax-company-awards-cover">
        <div class="container">
            <div class="row v-center">


                <div class="companytime nxlp-b col-lg-3">
                    <p>20 Yesrs* <span>Industry Experience</span></p>
                </div>

                <div class="companyawards col-lg-9">
                    <div class="niwax-logo-awards niwax-logo-slider owl-carousel">


                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/house.svg" alt="img">
                            <h6>Real estate</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/travel-case.svg" alt="img">
                            <h6>Tour &amp; Travels</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/video-tutorials.svg" alt="img">
                            <h6>Education</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/taxi.svg" alt="img">
                            <h6>Transport</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/event.svg" alt="img">
                            <h6>Event</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/smartphone.svg" alt="img">
                            <h6>eCommerce</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/joystick.svg" alt="img">
                            <h6>Game</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/healthcare.svg" alt="img">
                            <h6>Healthcare</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/money-growth.svg" alt="img">
                            <h6>Finance</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/baker.svg" alt="img">
                            <h6>Restaurant</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/mobile-app.svg" alt="img">
                            <h6>On-Demand</h6>
                        </div>

                        <div class="industry-workfors">
                            <img src="{{asset('public/frontend')}}/images/icons/groceries.svg" alt="img">
                            <h6>Grocery</h6>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- company awards icons -->

    <!-- who we are about-->
    <section class="why-choos-lg pad-tb deep-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="common-heading text-l">
                        <span>Who We Are</span>
                        <h2 class="mb20">Since 2000, We've Been the Most Dependable Web Design Company.</h2>
                        <p>We have produced IT solutions at a worldwide level by using the full potential of the latest disruptive technologies as one of the leading IT consulting companies in India. We have produced IT solutions at a worldwide level by using the full potential of the latest disruptive technologies as one of the leading IT consulting companies in India.</p>
                        <p>We have produced IT solutions at a worldwide level by using the full potential of the latest disruptive technologies as one of the leading IT consulting companies in India.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-design h-scl-">
                        <div class="imgac "> <img src="{{asset('public/frontend')}}/images/hero/creative-ag2a.jpg" alt="creative agnecy html template" class="ag-dg1 img-fluid h-scl-base"></div>
                        <div class="imgac h-scl-base"><img src="{{asset('public/frontend')}}/images/hero/creative-ag2b.jpg" alt="creative agnecy html template" class="ag-dg2 img-fluid "></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- who we are about-->

    <!--Start service -->
    <section class="nx-lp-service dark-bg4 bg-gradient3 pad-tb" id="work">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="niwaxwideserviceslider owl-carousel center-dots">

                        <div class="sliderset-nx">
                            <div class="service-we-deliverd">
                                <h2>Your Website Your Checkout Page</h2>
                                <p class="mt20">We have been providing Digital Marketing service from last 8 years by direct collaboration with our clients. As a Digital Marketing company we are providing all services like SEO Audit, Pay Per Click, Social Media Management, Organic SEO.</p>
                                <a href="#" class="niwax-btn2 mt40">More Details</a>
                            </div>
                            <div class="imagesofservice">
                                <img src="{{asset('public/frontend')}}/images/service/payment-service-1.svg" alt="niwax landing page 2" class="img-fluid">
                            </div>
                        </div>

                        <div class="sliderset-nx">
                            <div class="service-we-deliverd">
                                <h2>Boost your sales with our localized payment solution</h2>
                                <p class="mt20">We have been providing Digital Marketing service from last 8 years by direct collaboration with our clients. As a Digital Marketing company we are providing all services like SEO Audit, Pay Per Click, Social Media Management, Organic SEO.</p>
                                <a href="#" class="niwax-btn2 mt40">More Details</a>
                            </div>
                            <div class="imagesofservice">
                                <img src="{{asset('public/frontend')}}/images/service/payment-service-2.svg" alt="niwax landing page 2" class="img-fluid">
                            </div>
                        </div>

                        <div class="sliderset-nx">
                            <div class="service-we-deliverd">
                                <h2>Understanding your score helps you take the right next steps</h2>
                                <p class="mt20">We have been providing Digital Marketing service from last 8 years by direct collaboration with our clients. As a Digital Marketing company we are providing all services like SEO Audit, Pay Per Click, Social Media Management, Organic SEO.</p>
                                <a href="#" class="niwax-btn2 mt40">More Details</a>
                            </div>
                            <div class="imagesofservice">
                                <img src="{{asset('public/frontend')}}/images/service/payment-service-3.svg" alt="niwax landing page 2" class="img-fluid">
                            </div>
                        </div>

                        <div class="sliderset-nx">
                            <div class="service-we-deliverd">
                                <h2>A score of 750+ boosts your chances of getting a loan</h2>
                                <p class="mt20">We have been providing Digital Marketing service from last 8 years by direct collaboration with our clients. As a Digital Marketing company we are providing all services like SEO Audit, Pay Per Click, Social Media Management, Organic SEO.</p>
                                <a href="#" class="niwax-btn2 mt40">More Details</a>
                            </div>
                            <div class="imagesofservice">
                                <img src="{{asset('public/frontend')}}/images/service/payment-service-4.svg" alt="niwax landing page 2" class="img-fluid">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End service-->

    <!--Start why choose niwax company-->
    <section class="why-niwax-section pad-tb">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-12">
                    <div class="whychooseniwax v-center">

                        <div class="niwaxawardrow1">
                            <div class="awardbgwithtext">
                                <img src="{{asset('public/frontend')}}/images/icons/award-bg.png" alt="">
                                <p>20+<span>YEARS Experience</span></p>
                            </div>
                            <div class="awardbgwithtext">
                                <img src="{{asset('public/frontend')}}/images/icons/award-bg.png" alt="">
                                <p>20+<span>YEARS Experience</span></p>
                            </div>
                            <div class="awardbgwithtext">
                                <img src="{{asset('public/frontend')}}/images/icons/award-bg.png" alt="">
                                <p>20+<span>YEARS Experience</span></p>
                            </div>
                        </div>

                        <div class="niwaxawardrow2">
                            <h2>Why Should You <span class="text-radius text-light text-animation bg-b">Choose Us!</span></h2>
                            <h4 class="mt10 text-second">Find your reasons to choose us</h4>
                            <p class="mt20">We have been providing Digital Marketing service from last 8 years by direct collaboration with our clients. As a Digital Marketing company we are providing all services like SEO Audit, Pay Per Click, Social Media Management, Organic SEO.</p>
                            <p class="mt10">We work with organizations of all sizes, from startups to Fortune companies. We believe in forging long-lasting partnerships with all of our clients and we remain available to our clients whenever they need us. Contact us for more information.</p>

                            <div class="pairofbtn mt40">
                                <a href="#" class="niwax-btn3">Get In Touch With Us</a>
                                <a href="#" class="btnwithiconside d-flex gap10 v-center">
                                    <img src="{{asset('public/frontend')}}/images/icons/whatsapp.svg" alt="whatsapp">
                                    <div> <span>Or - Just Give Us A Call:</span>+91- 1234567890 </div>
                                </a>
                            </div>
                        </div>

                        <div class="niwaxawardrow1">
                            <div class="awardbgwithtext">
                                <img src="{{asset('public/frontend')}}/images/icons/award-bg.png" alt="">
                                <p>20+<span>YEARS Experience</span></p>
                            </div>
                            <div class="awardbgwithtext">
                                <img src="{{asset('public/frontend')}}/images/icons/award-bg.png" alt="">
                                <p>20+<span>YEARS Experience</span></p>
                            </div>
                            <div class="awardbgwithtext">
                                <img src="{{asset('public/frontend')}}/images/icons/award-bg.png" alt="">
                                <p>20+<span>YEARS Experience</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end why choose us -->
    <!--Start reveiws-->
    <section class="bg-gradient1 pad-tb dark-bg1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="common-heading ptag">
                        <span>Reviews</span>
                        <h2>Client Testimonials</h2>
                        <p class="mb30">Check our customers success stories.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt30">
                    <div class="niwax-review-slider owl-carousel center-dots">
                        <div class="reviews-card pr-shadow">
                            <div class="row v-center">
                                <div class="col"> <span class="revbx-lr"><i class="fas fa-quote-left"></i></span> </div>
                                <div class="col"> <span class="revbx-rl"><img src="{{asset('public/frontend')}}/images/client/upwork-logo.png" alt="review service logo"></span> </div>
                            </div>
                            <div class="review-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="-client-details-">
                                <div class="-reviewr">
                                    <img src="{{asset('public/frontend')}}/images/client/reviewer-a.jpg" alt="Good Review" class="img-fluid">
                                </div>
                                <div class="reviewer-text">
                                    <h4>Mario Speedwagon</h4>
                                    <p>Business Owner, <small>Jaipur</small></p>
                                    <div class="star-rate">
                                        <ul>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" ><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-card pr-shadow">
                            <div class="row v-center">
                                <div class="col"> <span class="revbx-lr"><i class="fas fa-quote-left"></i></span> </div>
                                <div class="col"> <span class="revbx-rl"><img src="{{asset('public/frontend')}}/images/client/upwork-logo.png" alt="review service logo"></span> </div>
                            </div>
                            <div class="review-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="-client-details-">
                                <div class="-reviewr">
                                    <img src="{{asset('public/frontend')}}/images/client/reviewer-a.jpg" alt="Good Review" class="img-fluid">
                                </div>
                                <div class="reviewer-text">
                                    <h4>Mario Speedwagon</h4>
                                    <p>Business Owner, <small>Jaipur</small></p>
                                    <div class="star-rate">
                                        <ul>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" ><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-card pr-shadow">
                            <div class="row v-center">
                                <div class="col"> <span class="revbx-lr"><i class="fas fa-quote-left"></i></span> </div>
                                <div class="col"> <span class="revbx-rl"><img src="{{asset('public/frontend')}}/images/client/upwork-logo.png" alt="review service logo"></span> </div>
                            </div>
                            <div class="review-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="-client-details-">
                                <div class="-reviewr">
                                    <img src="{{asset('public/frontend')}}/images/client/reviewer-a.jpg" alt="Good Review" class="img-fluid">
                                </div>
                                <div class="reviewer-text">
                                    <h4>Mario Speedwagon</h4>
                                    <p>Business Owner, <small>Jaipur</small></p>
                                    <div class="star-rate">
                                        <ul>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" ><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews-card pr-shadow">
                            <div class="row v-center">
                                <div class="col"> <span class="revbx-lr"><i class="fas fa-quote-left"></i></span> </div>
                                <div class="col"> <span class="revbx-rl"><img src="{{asset('public/frontend')}}/images/client/upwork-logo.png" alt="review service logo"></span> </div>
                            </div>
                            <div class="review-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="-client-details-">
                                <div class="-reviewr">
                                    <img src="{{asset('public/frontend')}}/images/client/reviewer-a.jpg" alt="Good Review" class="img-fluid">
                                </div>
                                <div class="reviewer-text">
                                    <h4>Mario Speedwagon</h4>
                                    <p>Business Owner, <small>Jaipur</small></p>
                                    <div class="star-rate">
                                        <ul>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" class="chked"><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                            <li> <a href="javascript:void(0)" ><i class="fas fa-star" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End reviews-->
    <!--Start pricing-->
    <section class="pricing-block pad-tb" id="price">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="common-heading ptag">
                        <span>Our Pricing</span>
                        <h2>Packages that are within your financial constraints</h2>
                        <p class="mb30">Choose from one of our three packages, all of which are priced competitively. We offer comprehensive yet cost-effective options. Everyone will find enticing features in our Basic, Professional, and Premium packages.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($packages as $package)
                    <div class="col-lg-4 col-md-6 nxpb-1">
                        <div class="niwaxpricingbox shadow">
                            <div class="pricingheader" data-background="{{asset('public/frontend')}}/images/icons/plan-1.svg">
                                <h2>{{$package->short_title}}</h2>
                            </div>
                            <div class="pricingrate">
                                <div class="pricevalue">
                                    <h2><sup>৳</sup> {{$package->final_price}}</h2>
                                </div>
                                <div class="priceoffer">
                                    <h2>{{$package->discount_percent}} <span>${{$package->price}}</span></h2>
                                </div>
                            </div>
                            <div class="pricingoffers">
                                <ul class="list-ul ul-check">
                                    @foreach(json_decode($package->feature) as $key => $packageFeature)
                                        <li>{{$packageFeature}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="priceodernow">
                                <div class="priceoderbtn"><a href="{{route('checkout',$package->id)}}" class="niwax-btn3">Order Now</a></div>
                                <div class="priceaskwithus">
                                    <a href="#" class="livechatbtn d-flex gap10 v-center">
                                        <i class="fas fa-comment"></i>
                                        <div><span>Click here to</span> Live Chat </div>
                                    </a>
                                </div>
                            </div>
                            <div class="pricingfooter mt30">
                                <div class="pfdiv1"><a href="#">Call Us: +91 123456790</a></div>
                                <div class="pfdiv2"><a href="#">Need Support</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!--End pricing-->
@endsection
@push('js')
@endpush
