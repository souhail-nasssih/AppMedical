@extends('layouts.sitePublic.master')

@section('content')
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Engagé pour votre santé</span>
                                <h1 class="cd-headline letters scale">Nous prenons soin de votre
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">santé</b>
                                        <b>bien-être</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Notre application facilite la gestion des dossiers médicaux pour améliorer la qualité des soins.</p>
                                <a href="{{ route('register', ['role' => 'medecin']) }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">
                                    Inscription Médecin <i class="ti-arrow-right"></i>
                                </a>
                                <a href="{{ route('register', ['role' => 'patient']) }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">
                                    Inscription Patient <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>À propos de notre application</span>
                            <h2>Bienvenue sur notre plateforme de gestion de dossiers médicaux</h2>
                        </div>
                        <p>Notre application permet aux médecins de gérer facilement les dossiers médicaux de leurs patients, d'ajouter des ordonnances, et de consulter des informations médicales complètes.</p>
                        {{-- <div class="about-btn1 mb-30">
                            <a href="{{ route('doctors') }}" class="btn about-btn">Trouver des médecins <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="{{ route('appointments') }}" class="btn about-btn2">Prendre rendez-vous <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="{{ route('emergency') }}" class="btn about-btn2">Urgence <i class="ti-arrow-right"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="{{ asset('sitePublic/assets/img/gallery/about2.png') }}" alt="">
                        </div>
                        <div class="about-back-img">
                            <img src="{{ asset('sitePublic/assets/img/gallery/about1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? Gallery Area Start -->
    <div class="gallery-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Notre Galerie</span>
                        <h2>Nos Moments Médicaux</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Left -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img"
                                    style="background-image: url({{ asset('sitePublic/assets/img/gallery/gallery1.png') }});">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url({{ asset('sitePublic/assets/img/gallery/gallery2.png') }});">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url({{ asset('sitePublic/assets/img/gallery/gallery3.png') }});">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url({{ asset('sitePublic/assets/img/gallery/gallery4.png') }});">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img"
                                    style="background-image: url({{ asset('sitePublic/assets/img/gallery/gallery5.png') }});">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img"
                                    style="background-image: url({{ asset('sitePublic/assets/img/gallery/gallery6.png') }});">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!--? Testimonials Start -->
    <div class="all-starups-area testimonial-area fix">
        <!-- left Contents -->
        <div class="starups">
            <!--? Testimonial Start -->
            <div class="h1-testimonial-active">
                <!-- Single Testimonial -->
                <div class="single-testimonial text-center">
                    <!-- Testimonial Content -->
                    <div class="testimonial-caption ">
                        <div class="testimonial-top-cap">
                            <img src="{{ asset('sitePublic/assets/img/gallery/testimonial.png') }}" alt="">
                            <p>“Cette application a révolutionné la manière dont je gère mes dossiers médicaux. Elle est intuitive et très pratique.”</p>
                        </div>
                        <!-- founder -->
                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                            <div class="founder-img">
                                <img src="{{ asset('sitePublic/assets/img/gallery/Homepage_testi.png') }}" alt="">
                            </div>
                            <div class="founder-text">
                                <span>Dr. Marie Dupont</span>
                                <p>Médecin généraliste</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonial -->
            </div>
            <!-- Testimonial End -->
        </div>
        <!--Right Contents  -->
        <div class="starups-img"></div>
    </div>
</main>
@endsection
