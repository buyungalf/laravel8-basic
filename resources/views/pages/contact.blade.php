@extends('layouts.master_home')

@section('home_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Contact</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<div class="map-section">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.4309003478807!2d110.37512181545881!3d-7.075937871323511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70899e36c42ad5%3A0xbaa5a3268efa1461!2sGg.%20Jokowi%2C%20Ngijo%2C%20Kec.%20Gn.%20Pati%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050228!5e0!3m2!1sen!2sid!4v1660198805115!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
</div>

<section id="contact" class="contact">
    <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

            <div class="col-lg-10">

                <div class="info-wrap">
                    <div class="row">
                        <div class="col-lg-4 info">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p> {{ $contact->address }}</p>
                        </div>

                        <div class="col-lg-4 info mt-4 mt-lg-0">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p> {{ $contact->email }}</p>
                        </div>

                        <div class="col-lg-4 info mt-4 mt-lg-0">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p> {{ $contact->phone }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @if(session('success'))
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="sent-message">{{ session('success') }}</div>
        </div>
        @endif
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <form action="{{ route('contact.form') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 for m-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>

                    <button class="mt-3 btn btn-success" type="submit">Send Message</button>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection