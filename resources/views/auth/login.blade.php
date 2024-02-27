@extends('template.layout_auth')

@section('content')
    <div class="my-auto page page-h">
        <div class="main-signin-wrapper">
            <div class="main-card-signin d-md-flex">
                <div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
                    <div class="my-auto authentication-pages">
                        <div>
                            <img src="{{ asset('') }}assets/img/brand/logo-white.png" class=" m-0 mb-4" alt="logo">
                            <h5 class="mb-4">Selamat datang di Aplikasi Kasir Online</h5>
                            {{-- <p class="mb-5"></p>
                    <a href="index.html" class="btn btn-success">Learn More</a> --}}
                        </div>
                    </div>
                </div>
                <div class="sign-up-body wd-md-50p">
                    <div class="main-signin-header">
                        <h2>Welcome back!</h2>
                        <h4>Please sign in to continue</h4>
                        @include('components.message')
                        <form action="{{ route('authentication') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label><input class="form-control" placeholder="Enter your email"
                                    type="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label> <input class="form-control" placeholder="Enter your password"
                                    type="password" name="password" value="{{ old('password') }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="main-signin-footer mt-3 mg-t-5">
                        <a href="{{ route('registrasi_petugas') }}" class="btn btn-info btn-block">Registrasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
