@extends('admin.layouts.app')

@section('section')

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product List</h4>
                    <h6>Manage your products</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('create.product') }}" class="btn btn-added"><img src="{{ asset('admin_assets/img/icons/plus.svg') }}" alt="img"
                            class="me-1">Add New Product</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('admin_assets/img/icons/pdf.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('admin_assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('admin_assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="form-select">
                                                <option>Choose Product</option>
                                                <option>Macbook pro</option>
                                                <option>Orange</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="form-select">
                                                <option>Choose Category</option>
                                                <option>Computers</option>
                                                <option>Fruits</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="form-select">
                                                <option>Choose Sub Category</option>
                                                <option>Computer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="form-select">
                                                <option>Brand</option>
                                                <option>N/D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12 ">
                                        <div class="form-group">
                                            <select class="form-select">
                                                <option>Price</option>
                                                <option>150.00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12">
                                        <div class="form-group">
                                            <a class="btn btn-filters ms-auto"><img
                                                    src="{{ asset('admin_assets/img/icons/search-whites.svg') }}" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>ID
                                        </label>
                                    </th>
                                    <th>Product Name</th>
                                    <th>Category </th>
                                    <th>Brand</th>
                                    <th>price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                                {{ $product->id }}
                                            </label>
                                        </td>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->image }}">
                                            </a>
                                            <a href="javascript:void(0);">{{ $product->name }}</a>
                                        </td>
                                        <td>{{ $product->category->cat_name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class='product-status-badge {{ $product->status ? 'bg-lightgreen' : 'bg-lightred' }} badges' data-id="{{ $product->id }}" data-status="{{ $product->status }}">
                                                {{ $product->status ? 'Active' : 'Inactive' }}
                                            </a>
                                        </td>
                                        <td>Admin</td>
                                        <td>
                                            <a class="me-3" href="{{ route('detail.product', ['product_id' => $product->id, 'product_name' => $product->name]) }}">
                                                <img src="{{ asset('admin_assets/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3 edit-product" href="#" data-edit="product-{{ $product->id }}">
                                                <img src="{{ asset('admin_assets/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <form action="{{ route('delete.product', $product->id) }}" method="post" style="display: none"
                                                id="delete-product-{{ $product->id }}">
                                                @csrf @method('DELETE')
                                            </form>
                                            <a class="product-delete-init" href="#" data-id="{{ $product->id }}">
                                                <img src="{{ asset('admin_assets/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // SweetAlert for delete confirmation
            $('.product-delete-init').on('click', function(event) {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    buttons: ['No, Cancel Operation.', 'Yes, Delete This Product.'],
                    dangerMode: true,
                }).then(function(isConfirmed) {
                    if (isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Successfully Deleted',
                        }).then(function() {
                            $("#delete-product-" + id).submit();
                        });
                    } else {
                        Swal("Cancelled", "Couldn't Able to delete the product");
                    }
                });
            });
        });

        $(document).on('click', '.edit-product', function() {
            var product = $(this).data('edit');
            id = product.replace('product-', '');
            $.ajax({
                url: '/admin/inventory/get-product/' + id,
                type: 'GET',
                success: function(response) {
                    $('#product_id').val(response.id);
                    $('#update_name').val(response.name);
                    $('#update_category').val(response.category);
                    // Set other fields similarly
                    $('#updateProductModal').modal('show');
                }
            });
        });

        $(document).on('click', '.product-status-badge', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            var newStatus = status ? 0 : 1; // toggle status

            Swal.fire({
                title: 'Are you sure?',
                text: `You want to change the status to ${newStatus ? 'Active' : 'Inactive'}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: `/admin/inventory/status-update-product/${id}`,
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: newStatus
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Updated',
                                text: `The product status has been updated to ${newStatus ? 'Active' : 'Inactive'}.`
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'There was an error updating the status.'
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'The product status remains unchanged.',
                        'info'
                    );
                }
            });
        });
    </script>

    @if (session('product_created_success'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Product Created Successfully',
                    text: '{{ session('product_created_success') }}',
                });
            });
        </script>
    @endif

    @if (session('product_deleted_success'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Product Created Successfully'
                });
            });
        </script>
    @endif

    @if (session('product_deleted_error'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'error',
                    title: "Couldn't able to delete this product!"
                });
            });
        </script>
    @endif

    @section('js_links')
        {{-- <script src="{{ asset('admin_assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/select2/js/custom-select.js') }}"></script> --}}
    @endsection

    @include('admin.inventory.product.update_product')

@endsection
