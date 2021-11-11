@extends ('layouts.user.app')
@section('content')

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h2> Sign in to Manage Your Posts</h2>
                <form method="POST" action="{{ route('login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <!-- Email input -->
                    <div class=" form-outline mb-4">
                        <input type="email" id="form1Example13" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="form-label" for="form1Example13">{{ __('E-Mail Address') }}</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example23" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="form-label" for="form1Example23">{{ __('Password') }}</label>
                    </div>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                        </div>
                        <a href="{{url('/register')}}">Register</a>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password</a>
                        @endif
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Sign in') }}</button>



                </form>
            </div>
        </div>
    </div>
</section>

@show