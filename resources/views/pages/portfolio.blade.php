@extends('layouts.master_home')

@section('home_content')
!-- ======= Portfolio Section ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Portfolio</h2>

            <ol>
                <li><a href="/">Home</a></li>
                <li>Portfolio</li>
            </ol>
        </div>
    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">

            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
            @foreach($images as $image)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ $image->image }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Raze</h4>
                    <a href="{{ $image->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Raze"><i class="bx bx-plus"></i></a>
                    <a href="{{ $image->image }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection