@extends('admin.layouts.app')

@section('title', 'Sign Up')

@section('section')

<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="{{ asset('admin_assets/img/logo.png') }}" alt="img">
                    </div>
                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        <!-- Form fields here -->
                        <div class="form-login">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="validationDefaultUsername"
                                    placeholder="Username" aria-describedby="inputGroupPrepend2" value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" name="password" class="pass-input form-control" placeholder="Enter your password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Sign In</button>
                        </div>
                        <div class="signinform text-center">
                            {{-- <h4>Don’t have an account? <a href="{{ route('admin.signup') }}" class="hover-a">Sign Up</a></h4> --}}
                        </div>
                    </form>

                </div>
            </div>
            <div class="login-img">
                <img src="{{ asset("admin_assets/img/login.jpg") }}" alt="img">
            </div>
        </div>
    </div>
</div>
    {{-- @if ($errors->any())
        <script>
            $(document).ready(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                });
            });
        </script>
    @endif
    <!-- Display success message in SweetAlert popup -->
    @if(session('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
                setTimeout(() => {
                    window.location.replace("{{ route('admin.dashboard') }}");
                }, 3000);
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid rwesdfasdfasdfCredentials',
                    text: '{{ session('error') }} this is from php'
                });
            });
        </script>
    @endif

    @if(session('admin_login_fail'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('admin_login_fail') }}',
                });
            });
        </script>
    @endif --}}

    @section('js_links')
        <script src="{{ asset('admin_assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    @endsection

@endsection
