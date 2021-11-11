@extends ('layouts.user.app')
@section('content')

<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-6">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="mb-4">

                        <h1 class="mb-1 fw-bold">{{ __('Reset Password') }}</h1>
                        <p>Fill the form to reset your password.</p>
                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('password.email') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email " required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Send Resest Link
                            </button>
                        </div>
                        <span>Return to <a href="{{ route('login') }}">sign in</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@show