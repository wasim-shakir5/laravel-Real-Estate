@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('asset_fo/images/hero_bg_1.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    {{-- <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span> --}}
                    <h1 class="mb-2">{{ $current_page }}</h1>
                    {{-- <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $property->price }}</strong></p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5 mt-5">
                    <h2>Your {{ $current_page }}...</h2>
                </div>
            </div>
        </div>

        <div class="row mb-5">

            @foreach ($properties as $property)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="{{ route('single.prop', $property->id) }}" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">{{ $property->type }}</span>
                                <span class="offer-type bg-success">{{ $property->home_type }}</span>
                            </div>
                            <img src="{{ asset('asset_fo/images/' . $property->image) }}" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <h2 class="property-title"><a href="{{ route('single.prop', $property->id) }}">{{ $property->title }}</a>
                            </h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                {{ $property->location }}</span>
                            <strong
                                class="property-price text-primary mb-3 d-block text-success">${{ $property->price }}</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">{{ $property->beds }} <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">{{ $property->baths }}</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">{{ $property->sq_ft }}</span>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
