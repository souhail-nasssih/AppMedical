@extends('layouts.sitePublic.master')

@section('content')
<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Médecins</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    
    <!--? Team Start -->
    <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Title -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Doctors</span>
                        <h2>Our Specialist</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($medecins as $medecin)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('sitePublic/assets/img/gallery/team2.png') }}" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">{{ $medecin->user->name }}</a></h3>
                            <span>Specialist</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
</main>
@endsection
