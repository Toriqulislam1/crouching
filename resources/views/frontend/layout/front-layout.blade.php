<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <title>{{$page_title}} | {{$site_title}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#fff">
    <!--website-favicon-->
    <link href="{{asset('public')}}/favicon.png" rel="icon">
    <!--plugin-css-->
    <link href="{{asset('public/frontend')}}/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('public/frontend')}}/css/plugin.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- template-style-->
    <link href="{{asset('public/frontend')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/css/responsive.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/css/darkmode.css" rel="stylesheet">
    <style>html { scroll-behavior: smooth;}</style>
</head>
<body>
<!--Start Preloader -->
<div class="onloadpage" id="page_loader">
    <div class="pre-content">
        <div class="logo-pre"><img src="{{asset('public')}}/logo.png" alt="Logo" class="img-fluid" /></div>
        <div class="pre-text- text-radius text-light text-animation bg-b">{{$page_title}} {{$site_title}}</div>
    </div>
</div>
<!--End Preloader -->
<!--Start Header -->
<header class="nav-bg-w main-header navfix fixed-top menu-white">
    <div class="container m-pad">
        <div class="menu-header">
            <div class="dsk-logo"><a class="nav-brand" href="{{route('/')}}">
                    <img src="{{asset('public')}}/logo.png" alt="Logo" class="mega-white-logo"/>
                    <img src="{{asset('public')}}/logo.png" alt="Logo" class="mega-darks-logo"/>
                </a>
            </div>
            <div class="custom-nav" role="navigation">
                <ul class="nav-list onepge">
                    <li><a href="#home" class="menu-links">Home</a></li>
                    <li><a href="#services" class="menu-links">Services</a></li>
                    <li><a href="#work" class="menu-links">Work</a></li>
                    <li><a href="#price" class="menu-links">Price</a></li>
                    @if(auth()->user())
                        <li><a href="{{route('dashboard')}}" class="menu-links">Dashboard</a></li>
                    @else
                        <li><a href="{{route('login')}}" class="menu-links">Login</a></li>
                    @endif
                    <li><a  data-bs-toggle="offcanvas" href="#offcanvasExample" class="btn-round- btn-br bg-btn3"><i class="fas fa-qrcode"></i></a></li>
                    <li><a href="#" class="btn-outline icon-btn">Chat With Us <i class="fab fa-whatsapp"></i></a> </li>
                </ul>
            </div>
            <div class="mobile-menu2">
                <ul class="mob-nav2">
                    <li><a class="btn-round- trngl btn-br bg-btn btshad-b1"  data-bs-toggle="offcanvas" href="#offcanvasExample"><i class="fas fa-qrcode"></i></a></li>
                    <li class="navm-"> <a class="toggle" href="#"><span></span></a></li>
                </ul>
            </div>
        </div>
        <!--Mobile Menu-->
        <nav id="main-nav">
            <ul class="first-nav">
                <li><a href="#home" class="menu-links">Home</a></li>
                <li><a href="#services" class="menu-links">Services</a></li>
                <li><a href="#work" class="menu-links">Work</a></li>
                <li><a href="#price" class="menu-links">Price</a></li>
                @if(auth()->user())
                    <li><a href="{{route('dashboard')}}" class="menu-links">Dashboard</a></li>
                @else
                    <li><a href="{{route('login')}}" class="menu-links">Login</a></li>
                @endif
            </ul>
            <ul class="bottom-nav">
                <li class="prb">
                    <a href="tel:+11111111111">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 384">
                            <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                    c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                    c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                    C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                            />
                        </svg>
                    </a>
                </li>
                <li class="prb">
                    <a href="mailto:somewebmedia@gmail.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </li>
                <li class="prb">
                    <a href="skype:niwax.company?call">
                        <svg enable-background="new 0 0 24 24" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="m23.309 14.547c1.738-7.81-5.104-14.905-13.139-13.543-4.362-2.707-10.17.352-10.17 5.542 0 1.207.333 2.337.912 3.311-1.615 7.828 5.283 14.821 13.311 13.366 5.675 3.001 11.946-2.984 9.086-8.676zm-7.638 4.71c-2.108.867-5.577.872-7.676-.227-2.993-1.596-3.525-5.189-.943-5.189 1.946 0 1.33 2.269 3.295 3.194.902.417 2.841.46 3.968-.3 1.113-.745 1.011-1.917.406-2.477-1.603-1.48-6.19-.892-8.287-3.483-.911-1.124-1.083-3.107.037-4.545 1.952-2.512 7.68-2.665 10.143-.768 2.274 1.76 1.66 4.096-.175 4.096-2.207 0-1.047-2.888-4.61-2.888-2.583 0-3.599 1.837-1.78 2.731 2.466 1.225 8.75.816 8.75 5.603-.005 1.992-1.226 3.477-3.128 4.253z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!--End Header -->

<!--Start Hero-->
<section class="hero-section niwax-lp2" id="home">
    <div class="niwax-lp-img nlp2 niwax" data-rellax-speed="-2"><img src="{{asset('public/frontend')}}/images/hero/niwax-lp-2b.svg" alt=""></div>
    <div class="niwax-lp-img nlp1 niwax" data-rellax-speed="4"><img src="{{asset('public/frontend')}}/images/hero/niwax-lp-2a.svg" alt=""></div>
    <div class="niwax-lp-img nlp4 niwax" data-rellax-speed="2"><img src="{{asset('public/frontend')}}/images/hero/niwax-lp-2d.svg" alt=""></div>
    <div class="niwax-lp-img nlp3 niwax" data-rellax-speed="3"><img src="{{asset('public/frontend')}}/images/hero/niwax-lp-2c.svg" alt=""></div>
    <div class="text-block">
        <div class="container">
            <div class="row v-center">
                <div class="col-lg-7">
                    <div class="header-headings">
                        <span class="text-effect-1">Solution-Oriented Services</span>
                        <h1 class="wow fadeIn mt20 mb30" data-wow-delay=".4s">The most straightforward payment solution for your company's requirements</h1>

                        <ul class="service-point-2 mt20 wow fadeIn" data-wow-delay=".8s">
                            <li># 800+ Mobile Delivered</li>
                            <li># 200+ Team Strength</li>
                            <li># User-Friendly Interface</li>
                            <li># 400 Happy Clients</li>
                            <li># 95% Repeat business</li>
                            <li># Quality Service UX</li>
                        </ul>
                        <!-- btn set -->
                        <div class="niwaxbtnvideo mt40 wow fadeIn" data-wow-delay="1s">
                            <a href="#" class="niwax-btn2">GET STARTED<i class="fas fa-chevron-right fa-icon"></i></a>
                            <div class="video-btn  d-flex v-center gap10">
                                <div class="video-intro-ppx"><a class="video-link play-video" href="https://www.youtube.com/watch?v=SZEflIVnhH8?autoplay=1&rel=0"><span class="triangle-play"></span></a></div>
                                <div class="title-hero">
                                    <p>Play Video</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 v-center">
                    <div class="niwax-lpimg-2">
                        <img src="{{asset('public/frontend')}}/images/hero/payment.svg"  alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Hero-->
@yield('content')

<!--Start Why Choose-->
<section class="service-block pad-tb bg-gradient3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading ptag">
                    <span>We Deliver Our Best</span>
                    <h2>Why Choose Niwax</h2>
                    <p class="mb30">Donec metus lorem, vulputate at sapien sit amet, auctor iaculis lorem. In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 mt30  wow fadeIn" data-wow-delay=".2s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon"><img src="{{asset('public/frontend')}}/images/icons/teama.svg" alt="service" class="img-fluid"></div>
                    <div class="s-block-content">
                        <h4>Reliable Service. In House Team</h4>
                        <p>In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt30 wow fadeIn" data-wow-delay=".5s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon"><img src="{{asset('public/frontend')}}/images/icons/link.svg" alt="service" class="img-fluid"></div>
                    <div class="s-block-content">
                        <h4>Trusted by People Like You</h4>
                        <p>In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt30 wow fadeIn" data-wow-delay=".8s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon"><img src="{{asset('public/frontend')}}/images/icons/tech.svg" alt="service" class="img-fluid"></div>
                    <div class="s-block-content">
                        <h4>Complete Technical Competency</h4>
                        <p>In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt30 wow fadeIn" data-wow-delay="1.1s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon"><img src="{{asset('public/frontend')}}/images/icons/hi.svg" alt="service" class="img-fluid"></div>
                    <div class="s-block-content">
                        <h4>Friendly & Cordial in Nature</h4>
                        <p>In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt30 wow fadeIn" data-wow-delay="1.4s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon"><img src="{{asset('public/frontend')}}/images/icons/badge.svg" alt="service" class="img-fluid"></div>
                    <div class="s-block-content">
                        <h4>Excellent Quality Delivered on Time</h4>
                        <p>In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mt30 wow fadeIn" data-wow-delay="1.7s">
                <div class="s-block wide-sblock">
                    <div class="s-card-icon"><img src="{{asset('public/frontend')}}/images/icons/tin.svg" alt="service" class="img-fluid"></div>
                    <div class="s-block-content">
                        <h4>Effective & Continuous Communication</h4>
                        <p>In vel hendrerit nisi. Vestibulum eget risus velit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="-cta-btn mt70">
            <div class="free-cta-title v-center wow zoomInDown" data-wow-delay="1.8s">
                <p>Let's Start a <span>New Project</span> Together</p>
                <a href="#" class="niwax-btn2">Inquire Now<i class="fas fa-chevron-right fa-icon"></i></a>
            </div>
        </div>
    </div>
</section>
<!--End Why Choose-->

<div class="clientslider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="niwax-client-slider owl-carousel">
                    <div class="awardlogo"> <img src="{{asset('public/frontend')}}/images/client/customer-logo-1.png" alt="icon"></div>
                    <div class="awardlogo"> <img src="{{asset('public/frontend')}}/images/client/customer-logo-2.png" alt="icon"></div>
                    <div class="awardlogo"> <img src="{{asset('public/frontend')}}/images/client/customer-logo-3.png" alt="icon"></div>
                    <div class="awardlogo"> <img src="{{asset('public/frontend')}}/images/client/customer-logo-4.png" alt="icon"></div>
                    <div class="awardlogo"> <img src="{{asset('public/frontend')}}/images/client/customer-logo-5.png" alt="icon"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Start Footer-->
<footer class="footerdez dark-footer pt50 pb80">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-sm-12 pt40">
                <div class="footerdez-a">
                    <h2>WE WOULD LOVE TO HEAR FROM YOU.</h2>
                    <p class="mt10">Feel free to reach out if you want to collaborate with us, or simply have a call.</p>
                    <div class="contactinfo mt30">
                        <a href="mailto:contact@domainame.com">contact@domainame.com <span>→</span></a>
                        <a href="tel:+91123456790">(91) 123 4567 7890 <span>→</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12">
                <div class="row fttlnks">
                    <div class="col-lg-4 col-sm-6 pt40">
                        <h5>OUR ADDRESS</h5>
                        <h4>New York</h4>
                        <p>603 FA Forest Avenue, New York, USA 10021</p>
                        <h4 class="mt30">India</h4>
                        <p>603 FA Forest Avenue, New York, USA 10021</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 pt40">
                        <h5>SUPPORT</h5>
                        <ul class="footer-address-list link-hover">
                            <li><a href="get-quote.html">Contact</a></li>
                            <li><a href="javascript:void(0)">Customer's FAQ</a></li>
                            <li><a href="javascript:void(0)">Refund Policy</a></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
                            <li><a href="javascript:void(0)">Terms and Conditions</a></li>
                            <li><a href="javascript:void(0)">License & Copyright</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-6 pt40">
                        <h5>Company</h5>
                        <ul class="footer-address-list link-hover">
                            <li><a href="get-quote.html">Contact</a></li>
                            <li><a href="javascript:void(0)">Customer's FAQ</a></li>
                            <li><a href="javascript:void(0)">Refund Policy</a></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
                            <li><a href="javascript:void(0)">Terms and Conditions</a></li>
                            <li><a href="javascript:void(0)">License & Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row fttlnks flexend">
                    <div class="col-lg-4 col-sm-6 pt60">
                        <h5>Follow Us</h5>
                        <div class="ff-social-icons mt30">
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
                            <a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 pt60">
                        <div class="footer-copyrights-">
                            <p>© 2020-2022. All Rights Reserved By <a href="https://themeforest.net/user/rajesh-doot/portfolio" target="blank">Rajesh Doot</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End Footer-->



<!--start off canvas nav -->
<div class="niwaxofcanvas offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
    <div class="offcanvas-body p0">
        <div class="companyinfodiv">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            <a href="#"><img src="{{asset('public/frontend')}}/images/logo.png" alt=""></a>
            <p class="companytitle">Niwax - Creative Agency & Portfolio HTML Template</p>
        </div>
        <div class="contactinfo-bar mt50">
            <h4 class="contactitle">Contact Info</h4>
            <div class="contact-data">
                <ul class="mt10">
                    <li><a href="tel:1111111111"><i class="fas fa-phone-alt"></i> +1-123-456-7890</a></li>
                    <li><a href="tel:1111111111"><i class="fab fa-whatsapp"></i> +1-123-456-7890</a></li>
                    <li><a href="skype:niwax.company?call"><i class="fab fa-skype"></i> niwax.company</a></li>
                    <li><a href="mailto:info@businessname.com"><i class="fas fa-envelope"></i> info@businessname.com</a></li>
                </ul>
            </div>
        </div>
        <div class="contactinfo-bar mt50">
            <h4 class="contactitle">Follow Us On</h4>
            <div class="contact-data">
                <div class="social-media-linkz mt10">
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-youtube"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-pinterest-p"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-dribbble"></i></a>
                    <a href="javascript:void(0)" target="blank"><i class="fab fa-behance"></i></a>
                </div>
            </div>
        </div>
        <div class="contactinfo-bar mt50">
            <h4 class="contactitle">Visit Us</h4>
            <div class="contact-data">
                <ul class="mt10">
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> <div class="locoff"><span>India</span>9988 Piazzetta Scalette Rubiani 99, Rome, 84090 </div></a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> <div class="locoff"><span>USA</span>9988 Piazzetta Scalette Rubiani 99, Rome, 84090 </div></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--end off canvas nav -->

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('public/frontend')}}/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="{{asset('public/frontend')}}/js/jquery.min.js"></script>
<script src="{{asset('public/frontend')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/frontend')}}/js/plugin.min.js"></script>
<script src="{{asset('public/frontend')}}/js/preloader.js"></script>
<script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
<!--common script file-->
<script src="js/main.js"></script>
<script>
    //Owl-Carousel - client logo
    var owl = $('.niwaxwideserviceslider');
    owl.owlCarousel({
        items:1,
        loop: true,
        center:false,
        autoplay: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: true,
        smartSpeed: 2000
    });
    //Owl-Carousel - client logo
    var owl = $('.niwax-client-slider');
    owl.owlCarousel({
        loop: true,
        center:false,
        autoplay: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplayTimeout: 3500,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        responsive: {
            0: {
                items: 3,
            },
            520: {
                items: 3
            },
            768: {
                items: 4
            },
            1200: {
                items: 4
            },
            1400: {
                items: 5
            },
            1600: {
                items: 6
            },
        }
    });
    //Owl-Carousel - awards card
    var owl = $('.niwax-logo-slider');
    owl.owlCarousel({
        loop: true,
        center:false,
        autoplay: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplayTimeout: 3500,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        responsive: {
            0: {
                items: 3,
            },
            520: {
                items: 3
            },
            768: {
                items: 4
            },
            1200: {
                items: 4
            },
            1400: {
                items: 5
            },
            1600: {
                items: 6
            },
        }
    });

    //Owl-Carousel - awards card
    var owl = $('.niwax-review-slider');
    owl.owlCarousel({
        items: 3,
        loop: true,
        center:false,
        autoplay: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        responsive: {
            0: {
                items: 1,
            },
            520: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 2
            },
            1400: {
                items: 3
            },
            1600: {
                items: 3
            },
        }
    });
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
