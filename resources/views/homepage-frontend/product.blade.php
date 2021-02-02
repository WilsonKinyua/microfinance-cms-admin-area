@extends('layouts.home-page')
@section('content')
<main>

    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="hero-cap text-center pt-50">
              <h2>Product</h2>
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
              <span>Products that we are providing</span>
              {{-- <h2>High Performance Services For All Industries.</h2> --}}
            </div>
          </div>
        </div>
        <div class="row">


            <div class="col-lg-4 col-md-6 col-sm-6">
            </div>


            @foreach ($aboutOurCompanies as $key => $about)

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-cat text-center mb-50">
                <div class="cat-icon">
                    {{-- <span class="flaticon-work"></span> --}}
                </div>
                <div class="cat-cap">
                    <h5> <a> NOS PRODUITS </a></h5>

                        <p>La SOFEPAC s.a offre à la population burundaise en générale et aux femmes en particulier, un large éventail de comptes qui peuvent répondre à leurs besoins.
                        </p>
                        <h6>→ LES COMPTES</h6>

                        <p>
                                ● Compte courant
                                ● Dépôts à terme
                                ● Epargne GWIZA
                                ● Epargne HIRWA
                                ● Epargne JUNIOR
                                ● Epargne IHANGIRO

                    </p>

                </div>
                </div>
            </div>

          @endforeach
          <div class="col-lg-4 col-md-6 col-sm-6">
        </div>

        </div>
      </div>
    </div>

  </main>
@endsection
