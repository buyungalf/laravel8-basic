@extends('layouts.master_home')

@include('layouts.body.slider')

@section('home_content')

<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>About Us</h2>
    </div>
    <div class="row content">
      <div class="col-lg-6" data-aos="fade-right">
        <h2>{{ $about->title }}</h2>
        <h3>{{ $about->short_desc }}</h3>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
        <p>
          {{ $about->long_desc }}
        </p>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Services</h2>
    </div>
    <div class="row">
      @foreach($services as $service)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box iconbox-{{ $service->color }}">
          <div class="icon">
            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
              <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
            </svg>
            <i class="bx bx-rocket"></i>
          </div>
          <h4><a href="">{{ $service->title }}</a></h4>
          <p>{{ $service->description }}</p>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">
    <div class="section-title">
      <h2>Portfolio</h2>
    </div>
    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up">
      @foreach($portfolio as $image)
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="{{ $image->image }}" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>App 1</h4>
          <p>App</p>
          <a href="{{ asset('') }}frontend/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- End Portfolio Section -->

<!-- ======= Our Clients Section ======= -->
<section id="clients" class="clients">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Brands</h2>
    </div>

    <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
      @foreach($brands as $brand)
      <div class="col-lg-3 col-md-4 col-6">
        <div class="client-logo">
          <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Our Clients Section -->


@endsection