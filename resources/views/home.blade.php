@extends('layouts.app')

@section('content')

    {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($properties as $prop)
        <div class="site-blocks-cover overlay" style="background-image: url({{ asset('asset_fo/images/' . $prop->image ) }});"
        data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">For
                        {{ $prop->type }}</span>
                        <h1 class="mb-2">{{ $prop->title }}</h1>
                        <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $prop->price }}</strong></p>
                        <p><a href="{{ route('single.prop', $prop->id) }}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See
                            Details</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="site-section site-section-sm pb-0">
        <div class="container">
            <div class="row">
                <form class="form-search col-md-12" style="margin-top: -100px;">
                    <div class="row  align-items-end">
                        <div class="col-md-3">
                            <label for="list-types">Listing Types</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="list-types" id="list-types" class="form-control d-block rounded-0">
                                    <option value="">Condo</option>
                                    <option value="">Commercial Building</option>
                                    <option value="">Land Property</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="offer-types">Offer Type</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                                    <option value="">For Sale</option>
                                    <option value="">For Rent</option>
                                    <option value="">For Lease</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="select-city">Select City</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                                    <option value="">New York</option>
                                    <option value="">Brooklyn</option>
                                    <option value="">London</option>
                                    <option value="">Japan</option>
                                    <option value="">Philippines</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                        <div class="mr-auto">
                            <a href="index.html" class="icon-view view-module active"><span
                                    class="icon-view_module"></span></a>
                            <a href="view-list.html" class="icon-view view-list"><span
                                    class="icon-view_list"></span></a>

                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <div>
                                <a href="#" class="view-list px-3 border-right active">All</a>
                                <a href="#" class="view-list px-3 border-right">Rent</a>
                                <a href="#" class="view-list px-3">Sale</a>
                            </div>


                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select class="form-control form-control-sm d-block rounded-0">
                                    <option value="">Sort by</option>
                                    <option value="">Price Ascending</option>
                                    <option value="">Price Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                @foreach ($properties as $prop)

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="{{ route('single.prop', $prop->id) }}" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">{{ $prop->type }}</span>
                                <span class="offer-type bg-success">{{ $prop->home_type }}</span>
                            </div>
                            <img src="{{ asset('asset_fo/images/' . $prop->image) }}" alt="Image not found - {{ $prop->image }}" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite save-{{ $prop->id }} save-property" data-property-id="{{ $prop->id }}"><span class="icon-heart-o"></span></a>
                            <a href="#" class="property-favorite unsave-property unsave-{{ $prop->id }}" data-property-id="{{ $prop->id }}" style="display: none;">
                                <span class="icon-heart-o"></span></a>

        {{--
            <button class="btn btn-primary save-property" data-property-id="{{ $property->id }}">Save</button>
            <button class="btn btn-danger unsave-property" data-property-id="{{ $property->id }}" style="display: none;">Unsave</button>
        --}}

                            <h2 class="property-title"><a href="property-details.html">{{ $prop->title }}</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                {{ $prop->location }}</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">${{ $prop->price }}</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">{{ $prop->beds }} <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">{{ $prop->baths }}</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">{{ $prop->sq_ft }}</span>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('layouts.home.why-choose-us')
    @include('layouts.home.recent-blog')
    @include('layouts.home.our-agents')

@endsection
