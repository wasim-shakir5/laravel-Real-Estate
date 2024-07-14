@extends('layouts.app')

@section('content')

@if (session('error_id_not_found'))
    <script>alert('{{ session('error_id_not_found') }}')</script>
@endif

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
                <form class="form-search col-md-12" id="property-filter-form" style="margin-top: -100px;">
                    <div class="row align-items-end">
                        <div class="col-md-3">
                            <label for="list-types">Listing Types</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="list-types" id="list-types" class="form-control d-block rounded-0">
                                    <option value="">Select Home Type</option>
                                    <option value="Palace">Palace</option>
                                    <option value="Mansion">Mansion</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="offer-types">Offer Type</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                                    <option value="">Select Type</option>
                                    <option value="Rent">Rent</option>
                                    <option value="Sale">Sale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="select-city">Select City</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                                    <option value="">Select Beds</option>
                                    <option value="1">1</option>
                                    <option value="2-3">2 to 3</option>
                                    <option value="3-5">3 to 5</option>
                                    <option value="5-8">5 to 8</option>
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
                                <a href="#" class="view-list px-3 border-right active" data-filter="all">All</a>
                                <a href="#" class="view-list px-3 border-right" data-filter="rent">Rent</a>
                                <a href="#" class="view-list px-3" data-filter="sale">Sale</a>
                            </div>


                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select class="form-control form-control-sm d-block rounded-0" id="sort-by">
                                    <option value="">Sort by</option>
                                    <option value="price_asc">Price Ascending</option>
                                    <option value="price_desc">Price Descending</option>
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
            <div class="row mb-5" id="property-list">

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function fetchProperties(filter = 'all', sort = '', listType = '', offerType = '', city = '') {
                $.ajax({
                    url: "{{ route('properties.filter') }}",
                    type: "GET",
                    data: {
                        type: filter,
                        sort: sort,
                        list_type: listType,
                        offer_type: offerType,
                        city: city
                    },
                    success: function(response) {
                        $('#property-list').html(response.html);
                    }
                });
            }

            $('.view-list').on('click', function(e) {
                e.preventDefault();
                $('.view-list').removeClass('active');
                $(this).addClass('active');
                let filter = $(this).data('filter');
                let sort = $('#sort-by').val();
                let listType = $('#list-types').val();
                let offerType = $('#offer-types').val();
                let city = $('#select-city').val();
                fetchProperties(filter, sort, listType, offerType, city);
            });

            $('#sort-by').on('change', function() {
                let sort = $(this).val();
                let filter = $('.view-list.active').data('filter');
                let listType = $('#list-types').val();
                let offerType = $('#offer-types').val();
                let city = $('#select-city').val();
                fetchProperties(filter, sort, listType, offerType, city);
            });

            $('#property-filter-form').on('submit', function(e) {
                e.preventDefault();
                let listType = $('#list-types').val();
                let offerType = $('#offer-types').val();
                let city = $('#select-city').val();
                let sort = $('#sort-by').val();
                let filter = $('.view-list.active').data('filter');
                fetchProperties(filter, sort, listType, offerType, city);
            });

            // Initial fetch
            fetchProperties();
        });

        $(document).ready(function() {
            $(document).on('click', '.save-property', function(e) {
                e.preventDefault(); console.log('here')
                var button = $(this);
                var propertyId = button.data('property-id'); console.log(propertyId);
                $.ajax({
                    headers: { 'cache-control': 'no-cache' },
                    cache: false,
                    async: true,
                    url: "{{ route('property.saver') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        property_id: propertyId,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            button.find('span').toggleClass('icon-heart-o icon-heart');
                            showAlert(response.message, response.action === 'saved' ? 'success' : 'danger');
                        } else {
                            showAlert(response.message, 'danger');
                        }
                    }
                });
            });

            function showAlert(message, type) {
                var alert = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                $('.alert-container').append(alert);
                setTimeout(function() {
                    alert.alert('close');
                }, 2000);
            }
        });
    </script>

    @include('pages.home.why-choose-us')
    @include('pages.home.recent-blog')
    @include('pages.home.our-agents')

@endsection
