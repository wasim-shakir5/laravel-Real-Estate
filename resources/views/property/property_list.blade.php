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
                @php $is_saved = in_array($prop->id, $saved_properties); @endphp
                <a href="#" id="save-property-btn-{{ $prop->id }}" class="property-favorite save-property" data-property-id="{{ $prop->id }}">
                    <span class="{{ $is_saved ? 'icon-heart' : 'icon-heart-o' }}"></span>
                </a>


                <h2 class="property-title"><a href="{{ route('single.prop', $prop->id) }}">{{ $prop->title }}</a></h2>
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
