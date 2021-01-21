<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!--

    ========================================================================
        Developed and managed by Developer Wilson
        Reach me through email: wilsonkinyuam@gmail.com for any question or something
        Phone Number: +254717255460
    =======================================================================================

    -->
    
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Microfinance Company </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.html">
  <link rel="shortcut icon" type="image/x-icon" href="https://newmark-imc.com/images/favicon.png">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/slicknav.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('assets_homepage/css/style.css') }}">

  @yield('styles')

</head>

<body>

  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{ asset('assets_homepage/img/logo/logo.png')}}" alt="">
        </div>
      </div>
    </div>
  </div>

  <header>

    <div class="header-area header-transparent">
      <div class="main-header  header-sticky">
        <div class="container-fluid">
          <div class="row align-items-center">

            <div class="col-xl-2 col-lg-2 col-md-1">
              <div class="logo">
                <a href="{{ route('home.page') }}"><img src="{{ asset('assets_homepage/img/logo/logo.png')}}" alt=""></a>
              </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10">
              <div class="menu-main d-flex align-items-center justify-content-end">

                <div class="main-menu f-right d-none d-lg-block">
                  <nav>
                    <ul id="navigation">
                      <li class=""><a href="{{ route('home.page') }}">Home</a></li>
                      <li><a href="{{ route('company.about') }}">About</a></li>
                      <li><a href="{{ route('company.services') }}">Services</a></li>
                      <li><a href="{{ route('company.blog') }}">Blog</a>
                        {{-- <ul class="submenu">
                          <li><a href="blog.html">Blog</a></li>
                          <li><a href="blog_details.html">Blog Details</a></li>
                          <li><a href="elements.html">Element</a></li>
                          <li><a href="apply.html">Apply Now</a></li>
                        </ul> --}}
                      </li>
                      <li><a href="{{ route('company.contact') }}">Contact</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="header-right-btn f-right d-none d-lg-block">
                  <a href="#" class="btn header-btn">+880.762.009.00 </a>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>


  @yield('content')


  <footer>

    <div class="footer-area">
      <div class="container">
        <div class="footer-top footer-padding">
          <div class="row justify-content-between">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="single-footer-caption mb-30">

                  <div class="footer-logo">
                    <a href="{{ route('home.page') }}"><img src="{{ asset('assets_homepage/img/logo/logo2_footer.png') }}" alt=""></a>
                  </div>
                  <div class="footer-pera">
                    <p>Heaven fruitful doesn't over lesser days appear creeping seasons so behold bearing</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Quick Link</h4>
                  <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Offers & Discounts</a></li>
                    <li><a href="#">Get Coupon</a></li>
                    <li><a href="#"> Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>New Products</h4>
                  <ul>
                    <li><a href="#">Woman Cloth</a></li>
                    <li><a href="#">Fashion Accessories</a></li>
                    <li><a href="#">Man Accessories</a></li>
                    <li><a href="#">Rubber made Toys</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Support</h4>
                  <ul>
                    <li><a href="#">Frequently Asked Questions</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#"> Privacy Policy</a></li>
                    <li><a href="#">Report a Payment Issue</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="row d-flex justify-content-between align-items-center">
            <div class="col-xl-9 col-lg-8">
              <div class="footer-copy-right">
                <p>
                  Copyright &copy;
                  <script>document.write(new Date().getFullYear());</script> All Rights Reserved |  by <a href="https://wezaprosoft.com/"
                    target="_blank">Weza Prosoft Limited</a>
                    {{-- <i class="fa fa-heart" aria-hidden="true"></i> --}}
                </p>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4">

              <div class="footer-social f-right">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fas fa-globe"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
  </div>


  <script src="{{ asset('assets_homepage/js/vendor/modernizr-3.5.0.min.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/popper.min.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/bootstrap.min.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/jquery.slicknav.min.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/slick.min.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/wow.min.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/animated.headline.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/jquery.magnific-popup.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/jquery.sticky.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/contact.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/jquery.form.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/mail-script.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/jquery.ajaxchimp.min.js')}}"></script>

  <script src="{{ asset('assets_homepage/js/plugins.js')}}"></script>
  <script src="{{ asset('assets_homepage/js/main.js')}}"></script>

  @yield('scripts')

  {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> --}}
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
    data-cf-beacon='{"rayId":"610166065b4d7263","version":"2020.12.2","si":10}'></script> --}}
</body>

</html>
