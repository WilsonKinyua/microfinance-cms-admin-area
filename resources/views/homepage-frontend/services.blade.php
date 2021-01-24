@extends('layouts.home-page')
@section('content')
<main>

    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="hero-cap text-center pt-50">
              <h2>Services</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="services-area section-padding30">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-10">

            <div class="section-tittle text-center mb-80">
              <span>Services that we are providing</span>
              <h2>High Performance Services For All Industries.</h2>
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
                    <h5><a >{{ $service->title ?? '' }}</a></h5>
                    <p>{{ $service->description ?? '' }}</p>
                </div>
                </div>
            </div>

          @endforeach

        </div>
      </div>
    </div>

  </main>
@endsection
