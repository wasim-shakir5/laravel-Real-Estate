@extends('admin.layouts.app')

@section('section')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Details</h4>
                <h6>Full details of a product</h6>
            </div>
        </div>


        @if (!is_object($product))
            <script>
                $(document).ready(function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'No product found',
                        text: 'Check the url'
                    });
                    setTimeout(() => {
                        window.location.replace("{{ route('list.product') }}");
                    }, 2000);
                });
            </script>
        @else
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Product</h4>
                                        <h6>{{ $product->name }} </h6>
                                    </li>
                                    <li>
                                        <h4>Category</h4>
                                        <h6>{{ $product->category->cat_name }}</h6>
                                    </li>
                                    <li>
                                        <h4>Brand</h4>
                                        <h6>{{ $product->brand }}</h6>
                                    </li>
                                    <li>
                                        <h4>Minimum Qty</h4>
                                        <h6>{{ $product->min_qty }}</h6>
                                    </li>
                                    <li>
                                        <h4>Quantity</h4>
                                        <h6>{{ $product->qty }}</h6>
                                    </li>
                                    <li>
                                        <h4>Price</h4>
                                        <h6>{{ $product->price }}</h6>
                                    </li>
                                    <li>
                                        <h4>Status</h4>
                                        <h6><span class='{{ $product->status ? 'bg-lightgreen' : 'bg-lightred' }} badges'>{{ $product->status ? 'Active' : 'Inactive' }}</span></h6>
                                    </li>
                                    <li>
                                        <h4>Description</h4>
                                        <h6>{{ $product->description }}</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="slider-product-details">
                                <div class="owl-carousel owl-theme product-slide">
                                    <div class="slider-product">
                                        <img src="{{ asset('/storage/'. $product->image) }}" alt="{{ $product->image }}">
                                        <h4>{{ $img_size }}</h4>
                                        <h6>{{ $product->image }}</h6>
                                    </div>
                                    {{-- <div class="slider-product">
                                        <img src="{{ asset('/storage'. $product->image) }}" alt="img">
                                        <h4>macbookpro.jpg</h4>
                                        <h6>581kb</h6>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif



    </div>
</div>

@section('js_links')
<script src="{{ asset('admin_assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
@endsection

@endsection
