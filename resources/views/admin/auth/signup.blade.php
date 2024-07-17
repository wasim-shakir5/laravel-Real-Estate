@extends('admin.layouts.app')

@section('title', 'Sign In')

@section('section')

<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="{{ asset('admin_assets/img/logo.png') }}" alt="img">
                    </div>
                    <form action="{{ route('admin.signup') }}" method="post">
                        @csrf
                        <div class="login-userheading">
                            <h3>Create an Account</h3>
                            <h4>Continue where you left off</h4>
                        </div>
                        <div class="form-login">
                            <label>Full Name</label>
                            <div class="form-addons">
                                <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') }}">
                                <img src="{{ asset('admin_assets/img/icons/users1.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                <input type="text" name="username" class="form-control @error('username') is-invalid" required @enderror id="validationDefaultUsername"
                                    placeholder="Username" aria-describedby="inputGroupPrepend2" value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="text" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
                                <img src="{{ asset('admin_assets/img/icons/mail.svg') }}" alt="img">
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" name="password" class="pass-input form-control " placeholder="Enter your password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-login">
                            <button type="submit" class="btn btn-login">Sign Up</button>
                        </div>
                        <div class="signinform text-center">
                            <h4>Already a user? <a href="{{ route('admin.login') }}" class="hover-a">Sign In</a></h4>
                        </div>
                        <div class="form-setlogin">
                            <h4>Or sign up with</h4>
                        </div>
                        <div class="form-sociallink">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('admin_assets/img/icons/google.png') }}" class="me-2" alt="google">
                                        Sign Up using Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('admin_assets/img/icons/facebook.png') }}" class="me-2" alt="google">
                                        Sign Up using Facebook
                                    </a>
                                </li>
                            </ul>
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
    @if ($errors->any())
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
                }, 5000);
            });
        </script>
    @endif

    @section('js_links')
        <script src="{{ asset('admin_assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    @endsection

@endsection
