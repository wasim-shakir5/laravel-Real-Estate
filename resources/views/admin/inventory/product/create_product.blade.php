@extends('admin.layouts.app')

@section('section')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Add</h4>
                    <h6>Create new product</h6>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('create.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                     value="{{ old('name') }}" required autocomplete="on" />
                                    @error('name')<div class="invalid-feedback">Product Name is Mandatory.</div> @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Choose Category</option>
                                        @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select id="brand" name="brand" class="form-control">
                                        <option value="">Choose Brand</option>
                                        <option value="apple" {{ old('brand') == 'apple' ? 'selected' : '' }}>Apple</option>
                                        <option value="banana" {{ old('brand') == 'banana' ? 'selected' : '' }}>Banana</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="min_qty">Minimum Qty</label>
                                    <input id="min_qty" name="min_qty" type="text" class="form-control" value="{{ old('min_qty') }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input id="qty" name="qty" type="text" class="form-control" value="{{ old('qty') }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control">
                                        {{ old('description') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input id="price" name="price" type="text" class="form-control" value="{{ old('price') }}" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="status"> Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="0">Closed</option>
                                        <option value="1">Open</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="image"> Product Image</label>
                                    <div class="image-upload">
                                        <input name="image" id="image" accept="image/png, image/jpeg, image/jpg" type="file" class="form-control">
                                        <div class="image-uploads">
                                            <img src="{{ asset('admin_assets/img/icons/upload.svg') }}" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('list.product') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @section('js_links')
        <script src="{{ asset('admin_assets/plugins/select2/js/select2.min.js') }}"></script>
    @endsection
@endsection

