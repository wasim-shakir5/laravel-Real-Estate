@extends('admin.layouts.app')

@section('section')
@if (session('admin_login_success'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                icon: 'success',
                title: 'Successfully Logged In',
                text: '{{ session('admin_login_success') }}'
            });
        });
    </script>
@endif
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
