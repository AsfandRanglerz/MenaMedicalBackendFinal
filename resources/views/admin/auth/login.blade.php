@extends('admin.auth.layout.app')
@section('title', 'Login')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header" >
                            <h4><img alt="image" style="height:auto;  width: 250px; padding-left:80px; padding-right:20px;" src="{{ asset('public/assets/images/logo.png') }}"</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{url('login')}}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus name="email" placeholder="example@gmail.com">
                                    @error('email')
                                    <span class="text-danger">Email required</span>
                                    @enderror
                                </div>
                              <div class="form-group position-relative">
                                        <label for="password" class="control-label">Password</label>

                                        <input id="password" type="password" class="form-control pr-5" name="password" required placeholder="Password">

                                        <i class="fa fa-eye position-absolute" id="togglePassword"
                                        style="top: 38px; right: 15px; cursor: pointer; z-index: 2;"></i>

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" tabindex="3" id="remember-me" name="remember">
                                        <div class="d-block">
                                            {{-- <label class="custom-control-label" for="remember-me">Remember Me</label> --}}
                                            <div class="float-right">
                                                <a href="{{url('admin-forgot-password')}}" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                            {{--<div class="text-center mt-4 mb-3">
                                <div class="text-job text-muted">Login With Social</div>
                            </div>
                            <div class="row sm-gutters">
                                <div class="col-6">
                                    <a class="btn btn-block btn-social btn-facebook">
                                        <span class="fab fa-facebook"></span> Facebook
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-block btn-social btn-twitter">
                                        <span class="fab fa-twitter"></span> Twitter
                                    </a>
                                </div>
                            </div>--}}
                        </div>
                    </div>
{{--                    <div class="mt-5 text-muted text-center">--}}
{{--                        Don't have an account? <a href="{{ route('admin.register') }}">Create One</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>

@endsection

