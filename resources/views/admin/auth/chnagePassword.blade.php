@extends('admin.auth.layout.app')
@section('title', 'Change Password    ')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Reset Password</h4>
                        </div>
                        <div class="card-body">
                            @if(session()->has('error_message'))
                            <p class="text-danger">The password and confirmation password do not match</p>
                            @else
                                <p class="text-muted">Enter Your New Password</p>
                            @endif
                            <form method="POST" action="{{url('admin-reset-password')}}">
                                 @csrf
                                <input value="{{$user->email}}" type="hidden" name="email" >
                                <div class="form-group position-relative">
                                        <label for="password">New Password</label>
                                        <input id="password" type="password" class="form-control pr-5 pwstrength" name="password" data-indicator="pwindicator" placeholder="password">
                                        <i class="fa fa-eye position-absolute toggle-password"
                                        toggle="#password"
                                        style="top: 38px; right: 15px; cursor: pointer;"></i>
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group position-relative">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control pr-5" name="confirmed" placeholder="password">
                                        <i class="fa fa-eye position-absolute toggle-password"
                                        toggle="#password-confirm"
                                        style="top: 38px; right: 15px; cursor: pointer;"></i>
                                        @error('confirmed') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    document.querySelectorAll('.toggle-password').forEach(function (icon) {
        icon.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === "password") {
                input.type = "text";
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });
</script>

@endsection

