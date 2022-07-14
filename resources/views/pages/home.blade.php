@extends('layouts.app')
@section('title','Homepage')

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>Explore The Beautiful World<br />
            As Easy As One Click
        </h1>
        <p class="mt-3">
            You will see beautiful
            <br />
            moment you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4"> Get Started</a>
    </header>

    <!-- Main -->
    <Main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-6 col-sm-3 col-lg-3  col-md-3 stats-detail">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-6  col-sm-3 col-lg-3  col-md-3 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-6   col-sm-3 col-lg-3  col-md-3 stats-detail">
                    <h2>3K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-6   col-sm-3 col-lg-3  col-md-3 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>


        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Popular Destination</h2>
                        <p>Something that you never try
                            <br />
                            before in this world
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        
                  
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('{{ $item->galleries->count() ? 
                            Storage::url($item->galleries->first()->image):'' }}');">
                            <div class="travel-country">{{ $item -> location }}</div>
                            <div class="travel-location">{{  $item -> title}}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail', $item -> slug) }}" class="btn btn-travel-details px-4">View Details</a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>

        </section>

        <section class="section-network">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Partners</h2>
                        <p>Companies who trusted us
                            <br />
                            Like a families
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="{{ url('frontend/images/partner.png') }}" alt="" class="img-partner">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2> They Are Loving Us</h2>
                        <p>
                            Moments were giving them
                            <br>the best experience
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ url('frontend/images/avatar-1.png') }}" alt="User" class="mb-4 rounded circle">
                                <h3 class="mb-4 "> Wildan</h3>
                                <p class="testimonial">
                                    “ The Dose of Vitamin Sea of the Bali really fullfil my traveling needs “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Nusa Penida
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ url('frontend/images/avatar-2.png') }}" alt="User" class="mb-4 rounded circle">
                                <h3 class="mb-4 "> Tari</h3>
                                <p class="testimonial">
                                    “ The more i hike, the more i see the hidden beauties reveals before my own very eyes “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bromo
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ url('frontend/images/avatar-3.png') }}" alt="User" class="mb-4">
                                <h3 class="mb-4 "> Khansa</h3>
                                <p class="testimonial">
                                    “ The cultural experiences is really the highlight of my trip. Nothing can top off it “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Borobudur
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
                    <a href="#" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
                </div>
            </div>
        </section>
        </div>
    </Main>
@endsection
