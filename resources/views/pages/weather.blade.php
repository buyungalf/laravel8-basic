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
<section id="contact" class="contact">
    <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

            <div class="col-lg-10">
                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="{{ route('weather.input') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Input city name" required>

                                </div>
                            </div>
                            <button class="mt-3 btn btn-success" type="submit">Check</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection