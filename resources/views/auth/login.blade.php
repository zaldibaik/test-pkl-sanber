@extends('layouts.navlogin')

@section('content')

<main class="main-content">
    <div class="page-header bg-info align-items-start min-vh-100">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                <div class="row mt-3">
                                    <div class="col-2 text-center ms-auto">
                                        <a class="btn btn-link px-3" href="{{ url('/') }}">
                                            <i class=" fa fa-home text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center px-1">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-github text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center me-auto">
                                        <a href="{{ url('/auth/google') }}">
                                            <i class="fa fa-google text-white text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="text-start" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-group input-group-outline">
                                    <label for="email" class="input-group input-group-outline ">{{ __('Email Address') }}</label>

                                    <div class="col">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>

                                <div class="input-group input-group-outline">
                                    <label for="password" class="input-group input-group-outline mb-3">{{ __('Password') }}</label>
                                    <div class="col">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-group input-group-outline">
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col">
                                        <button type="submit" class="btn bg-gradient-info w-100 my-4">
                                            {{ __('login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-6 my-auto">
                    <div class="copyright text-center text-sm text-white text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())

                        </script>,
                        made with <i class="fa fa-heart" aria-hidden="true"></i> by
                        <a href="#" class="font-weight-bold text-white" target="_blank">Zaldi</a>
                        for a better web.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>

@endsection
