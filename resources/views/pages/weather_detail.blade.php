@extends('layouts.master_home')

@section('home_content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Weather</h2>

            <ol>
                <li><a href="/">Home</a></li>
                <li>Weather</li>
            </ol>
        </div>
    </div>
</section>
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-3 col-md-6 mx-auto">
                <div class="box featured">
                    <h3>{{ $data->name }}, {{ $data->sys->country}}</h3>
                    <img class="mb-3" src="/icons/cloud.svg" style="max-width: 125px" alt="Weather Icon">
                    <h4>{{ round($data->main->temp, 0) }}<sup> °</sup>C</h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="/weather" class="btn-buy">Try Again</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Pricing Section -->
@endsection