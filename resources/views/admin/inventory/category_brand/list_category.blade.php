@extends('admin.layouts.app')

@section('title', 'Category')

@section('section')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Category list</h4>
                <h6>View/Search product Category</h6>
            </div>
            <div class="page-btn">
                <button type="button" class="btn btn-primary btn btn-added" data-bs-toggle="modal" data-bs-target="#create-category">
                    <img src="{{ asset('admin_assets/img/icons/plus.svg') }}" class="me-1" alt="img">Add Category
                </button>
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
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <select class="form-select" id="choose-category" name="choose-category">
                                    <option>Choose Category</option>
                                    <option>Computers</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                            <div class="form-group">
                                <a class="btn btn-filters ms-auto"><img
                                        src="{{ asset('admin_assets/img/icons/search-whites.svg') }}" alt="img"></a>
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
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Category name</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox" class="cat-checkbox" data-id="{{ $cat->id }}" name="cat-checkbox" />
                                            <span class="checkmarks"></span> {{ $cat->id }}
                                        </label>
                                    </td>
                                    <td class="productimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            <img src="{{ asset('storage/'. $cat->cat_image) }}" alt="category image">
                                        </a>
                                        <a href="javascript:void(0);">{{ $cat->cat_name }}</a>
                                    </td>
                                    <td>{{ $cat->cat_description }}</td>
                                    <td>Admin</td>
                                    <td>
                                        <a class="me-3" href="editcategory.html">
                                            <img src="{{ asset('admin_assets/img/icons/edit.svg') }}" alt="img">
                                        </a>
                                        <form action="{{ route('delete.category', $cat->id) }}" id="delete-category-{{ $cat->id }}"
                                            style="display: none;" method="post">
                                            @csrf @method('DELETE')
                                        </form>
                                        <a class="me-3 category-delete-init" href="#" data-id="{{ $cat->id }}">
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
        $('.category-delete-init').on('click', function(event) {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: `/admin/inventory/delete-category/${id}`,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'Category has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Failed!',
                                    response.fail,
                                    'error'
                                );
                            }
                        },
                        error: function(response) {
                            Swal.fire(
                                'Failed!',
                                'There was an error deleting the category.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>

@include('admin.inventory.category_brand.create_category')

@endsection
