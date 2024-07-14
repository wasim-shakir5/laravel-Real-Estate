@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('asset_fo/images/' . $property->image) }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{ $property->title }}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $property->price }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($others as $item)
                                <div><img src="{{ asset('asset_fo/images/' . $item->image) }}" alt="Image"
                                        class="img-fluid"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">${{ $property->price }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
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
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                <strong class="d-block">{{ $property->home_type }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $property->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">${{ $property->price_sqft }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $property->more_info }}</p>

                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>
                            @foreach ($gallery as $item)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('asset_fo/images/' . $item->image) }}"
                                        class="image-popup gal-item"><img
                                            src="{{ asset('asset_fo/images/' . $item->image) }}" alt="Image"
                                            class="img-fluid"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">
                        @if (!$user_id)
                            <div class="alert alert-danger" role="alert">
                                Please Login to Contact the Agent of this Property. Also, You can able to Save this property for future uses.
                            </div>
                        @else
                        <h3 class="h4 text-black widget-title mb-3 text-center">Contact Agent</h3>
                            @if (session('request_success'))

                            <div class="alert alert-success" role="alert">{{ session('request_success') }}</div>
                            @endif
                            @if ($submission_count < 3)
                        <form action="{{ route('contact.agent.submit') }}" method="POST" class="form-contact-agent">
                            @csrf
                            <input type="hidden" value="{{ $property->id }}" name="property_id" />
                            <input type="hidden" value="{{ $property->agent_name }}" name="agent_name" />
                            <input type="hidden" value="{{ $user_id }}" name="user_id" />

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" autocomplete="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" autocomplete="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" autocomplete="tel"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" />
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="10"
                                    style="height: 100px">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" id="phone" class="btn btn-primary" value="Send Message" />
                            </div>
                        </form>
                        @if ($submission_count > 0)
                            <div class="alert alert-warning" role="alert">
                                You have {{ 3 - $submission_count }} more {{ Str::plural('request', 3 - $submission_count) }} to send.
                            </div>
                        @endif
                    @else
                        <div class="alert alert-danger">
                            You have spent all the submissions. Please wait until the agent reaches out to you.
                        </div>
                    @endif

                    </div>

                    <div class="bg-white widget border rounded text-center">
                        <h3 class="h4 text-black widget-title mb-3 text-center">Save Property</h3>
                        <button id="save-property-btn-{{ $property->id }}" class="btn btn-primary save-property" data-property-id="{{ $property->id }}">
                            {{ $is_saved ? 'Property Saved. Click to Unsave' : 'Save this Property' }}
                        </button>

                        @endif

                    </div>

                    <div class="bg-white widget border rounded text-center">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                        <div class="px-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($property_url) }}&quote={{ urlencode($property->title) }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($property->title) }}&url={{ urlencode($property_url) }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($property_url) }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @if (!$related_properties->isEmpty())
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">

                @foreach ($related_properties as $property)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="property-details.html" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-danger">{{ $property->type }}</span>
                                    <span class="offer-type bg-success">{{ $property->home_type }}</span>
                                </div>
                                <img src="{{ asset('asset_fo/images/' . $property->image) }}" alt="Image"
                                    class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title"><a href="property-details.html">{{ $property->title }}</a>
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
    @endif

    <script>
        $(document).ready(function() {
            $('.save-property').on('click', function(e) {
                e.preventDefault();
                var button = $(this);
                var propertyId = button.data('property-id');
                $.ajax({
                    headers: { 'cache-control': 'no-cache' },
                    url: "{{ route('property.saver') }}",
                    method: 'POST',
                    async: true,
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        property_id: propertyId,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            button.text(response.action === 'saved' ? 'Property Saved. Click to Unsave' : 'Save This Property');
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

@endsection
