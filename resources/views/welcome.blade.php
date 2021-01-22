@extends('layouts.home-page')

@section('content')

<main>

    <div class="slider-area slider-height" data-background="{{ asset('assets_homegpage/img/hero/h1_hero.jpg')}}">
      <div class="slider-active">

        @foreach ($homePageSlides as $key => $slides)

        <div class="single-slider">
            <div class="slider-cap-wrapper">
                <div class="hero__caption">
                <p data-animation="fadeInLeft" data-delay=".2s"> {{ $slides->caption ?? '' }} </p>
                <h1 data-animation="fadeInLeft" data-delay=".5s">{{ $slides->description ?? '' }}</h1>

                <a href="{{ route('company.apply') }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay=".8s">Apply for Loan</a>
                </div>
                <div class="hero__img">
                    @if($slides->photo)
                        <img class="img-responsive" src="{{ $slides->photo->getUrl() }}" alt="">
                    @endif
                </div>
            </div>
        </div>

        @endforeach

      </div>

      <div class="slider-footer section-bg d-none d-sm-block">
        <div class="footer-wrapper">

          <div class="single-caption">
            <div class="single-img">
              <img src="{{ asset('assets_homepage/img/hero/hero_footer.png')}}" alt="">
            </div>
          </div>

          <div class="single-caption">
            <div class="caption-icon">
              <span class="flaticon-clock"></span>
            </div>
            <div class="caption">
              <p>Quick & Easy Loan</p>
              <p>Approvals</p>
            </div>
          </div>

          <div class="single-caption">
            <div class="caption-icon">
              <span class="flaticon-like"></span>
            </div>
            <div class="caption">
              <p>Quick & Easy Loan</p>
              <p>Approvals</p>
            </div>
          </div>

          <div class="single-caption">
            <div class="caption-icon">
              <span class="flaticon-money"></span>
            </div>
            <div class="caption">
              <p>Quick & Easy Loan</p>
              <p>Approvals</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    @foreach ($aboutOurCompanies as $key => $about)



    <div class="about-low-area section-padding2">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="about-caption mb-50">

              <div class="section-tittle mb-35">
                <span>About Our Company</span>
                <h2> {{ $about->title ?? '' }} </h2>
              </div>

                {!! $about->description ?? '' !!}


              <a href="{{ route('company.apply') }}" class="btn">Apply for Loan</a>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">

            <div class="about-img ">
              {{-- <div class="about-font-img d-none d-lg-block">
                @if($about->photo)
                    <img style="height: 500px; width:auto;"  src="{{ $about->photo->getUrl() }}">
                @endif
              </div> --}}
              <div class="about-back-img ">
                @if($about->photo)
                    <img style="height: 500px; width:auto;"  src="{{ $about->photo->getUrl() }}">
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach

    <div class="services-area pt-150 pb-150" data-background="{{ asset('assets_homepage/img/gallery/section_bg02.jpg')}}">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-10">

            <div class="section-tittle text-center mb-80">
              {{-- <span>Services that we are providing</span>
              <h2>High Performance Services For All Industries.</h2> --}}
              <h2>Services that we are providing</h2>
            </div>
          </div>
        </div>
        <div class="row">

         @foreach ($services as $key => $service)

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                <div class="cat-icon">
                    {{-- <span class="flaticon-work"></span> --}}
                </div>
                <div class="cat-cap">
                    <h5><a href="{{ route('company.services') }}">{{ $service->title ?? '' }}</a></h5>
                    <p>{{ $service->description ?? '' }}</p>
                </div>
                </div>
            </div>

          @endforeach
          {{-- <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat text-center mb-50">
              <div class="cat-icon">
                <span class="flaticon-loan"></span>
              </div>
              <div class="cat-cap">
                <h5><a href="{{ route('company.services') }}">Commercial Loans</a></h5>
                <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat text-center mb-50">
              <div class="cat-icon">
                <span class="flaticon-loan-1"></span>
              </div>
              <div class="cat-cap">
                <h5><a href="{{ route('company.services') }}">Construction Loans</a></h5>
                <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat text-center mb-50">
              <div class="cat-icon">
                <span class="flaticon-like"></span>
              </div>
              <div class="cat-cap">
                <h5><a href="{{ route('company.services') }}">Business Loan</a></h5>
                <p>Consectetur adipisicing elit, sed doeiusmod tempor incididunt ut labore et dolore</p>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>

    @foreach ($whyChooseOurCompanies as $key => $choose)

    <div class="support-company-area section-padding3 fix">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-6 col-lg-6">
            <div class="support-location-img mb-50">
                @if($choose->photo)
                    <img src="{{ $choose->photo->getUrl() }}">
                @endif
              <div class="support-img-cap">
                <span>Since 2020</span>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="right-caption">

              <div class="section-tittle">
                <span>Why Choose Our Company</span>
                <h2>We Promise Sustainable Future For You.</h2>
              </div>
              <div class="support-caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                {{-- <div class="select-suport-items">
                  <label class="single-items">Aorem ipsum dgolor sitnfd amet dfgbn fbsdg
                    <input type="checkbox" checked="checked active">
                    <span class="checkmark"></span>
                  </label>
                  <label class="single-items">Consectetur adipisicing bfnelit, sedb dvbnfo
                    <input type="checkbox" checked="checked active">
                    <span class="checkmark"></span>
                  </label>
                  <label class="single-items">Eiusmod tempor incididunt vmgldupout labore
                    <input type="checkbox" checked="checked active">
                    <span class="checkmark"></span>
                  </label>
                  <label class="single-items">Admkde mibvnim veniam, quivds cnostrud.
                    <input type="checkbox" checked="checked active">
                    <span class="checkmark"></span>
                  </label>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach

    <div class="application-area pt-150 pb-140" data-background="{{ asset('assets_homepage/img/gallery/section_bg03.jpg')}}">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-10">

            <div class="section-tittle section-tittle2 text-center mb-45">
              <span>Apply in Three Easy Steps</span>
              <h2>Easy Application Process For Any Types of Loan</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-9 col-xl-8">

            <form action="#" class="search-box">
              <div class="select-form">
                <div class="select-itms">
                  <select name="select" id="select1">
                    <option value="">Select Amount</option>
                    <option value="">$120</option>
                    <option value="">$700</option>
                    <option value="">$750</option>
                    <option value="">$250</option>
                  </select>
                </div>
              </div>
              <div class="select-form">
                <div class="select-itms">
                  <select name="select" id="select1">
                    <option value="">Duration Month</option>
                    <option value="">7 Days</option>
                    <option value="">10 Days</option>
                    <option value="">14 Days Days</option>
                    <option value="">20 Days</option>
                  </select>
                </div>
              </div>
              <div class="input-form">
                <input type="text" placeholder="Return Amount">
              </div>
              <div class="search-form">
                <a href="{{ route('company.services') }}">Apply for Loan</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="team-area section-padding30">
      <div class="container">
        <div class="row justify-content-center">
          <div class="cl-xl-7 col-lg-8 col-md-10">

            <div class="section-tittle text-center mb-70">
              <span>Our Loan Section Team Mambers</span>
              <h2>Take a look to our professional team members.</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-team mb-30">
              <div class="team-img">
                <img src="{{ asset('assets_homepage/img/gallery/home_blog1.png')}}" alt="">

                <div class="team-social">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fas fa-globe"></i></a></li>
                </div>
              </div>
              <div class="team-caption">
                <h3><a href="#">Bruce Roberts</a></h3>
                <p>Volunteer leader</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-team mb-30">
              <div class="team-img">
                <img src="{{ asset('assets_homepage/img/gallery/home_blog2.png')}}" alt="">

                <div class="team-social">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fas fa-globe"></i></a></li>
                </div>
              </div>
              <div class="team-caption">
                <h3><a href="#">Bruce Roberts</a></h3>
                <p>Volunteer leader</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-team mb-30">
              <div class="team-img">
                <img src="{{ asset('assets_homepage/img/gallery/home_blog3.png')}}" alt="">

                <div class="team-social">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fas fa-globe"></i></a></li>
                </div>
              </div>
              <div class="team-caption">
                <h3><a href="#">Bruce Roberts</a></h3>
                <p>Volunteer leader</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="single-team mb-30">
              <div class="team-img">
                <img src="{{ asset('assets_homepage/img/gallery/home_blog4.png')}}" alt="">

                <div class="team-social">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fas fa-globe"></i></a></li>
                </div>
              </div>
              <div class="team-caption">
                <h3><a href="#">Bruce Roberts</a></h3>
                <p>Volunteer leader</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="testimonial-area t-bg testimonial-padding">
      <div class="container ">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-11 col-lg-11 col-md-9">
            <div class="h1-testimonial-active">

              <div class="single-testimonial text-center">

                <div class="testimonial-caption ">
                  <div class="testimonial-top-cap">
                    <img src="{{ asset('assets_homepage/img/gallery/testimonial.png')}}" alt="">
                    <p>Logisti Group is a representative logistics operator providing full range of ser
                      of customs clearance and transportation worl.</p>
                  </div>

                  <div class="testimonial-founder d-flex align-items-center justify-content-center">
                    <div class="founder-img">
                      <img src="{{ asset('assets_homepage/img/testmonial/Homepage_testi.png')}}" alt="">
                    </div>
                    <div class="founder-text">
                      <span>Jessya Inn</span>
                      <p>Co Founder</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="single-testimonial text-center">

                <div class="testimonial-caption ">
                  <div class="testimonial-top-cap">
                    <img src="{{ asset('assets_homepage/img/gallery/testimonial.png')}}" alt="">
                    <p>Logisti Group is a representative logistics operator providing full range of ser
                      of customs clearance and transportation worl.</p>
                  </div>

                  <div class="testimonial-founder d-flex align-items-center justify-content-center">
                    <div class="founder-img">
                      <img src="{{ asset('assets_homepage/img/testmonial/Homepage_testi.png')}}" alt="">
                    </div>
                    <div class="founder-text">
                      <span>Jessya Inn</span>
                      <p>Co Founder</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="home-blog-area section-padding30">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-md-10">

            <div class="section-tittle text-center mb-70">
              <span>News form our latest blog</span>
              <h2>News from around the world selected by us.</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="single-blogs mb-30">
              <div class="blog-images">
                <img src="{{ asset('assets_homepage/img/gallery/blog1.png')}}" alt="">
              </div>
              <div class="blog-captions">
                <span>January 28, 2020</span>
                <h2><a href="#">The advent of pesticides brought
                    in its benefits and pitfalls.</a></h2>
                <p>October 6, a2020by Steve</p>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="single-blogs mb-30">
              <div class="blog-images">
                <img src="{{ asset('assets_homepage/img/gallery/blog2.png')}}" alt="">
              </div>
              <div class="blog-captions">
                <span>January 28, 2020</span>
                <h2><a href="#">The advent of pesticides brought
                    in its benefits and pitfalls.</a></h2>
                <p>October 6, a2020by Steve</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>


@endsection
