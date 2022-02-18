@extends('layouts.admin')

@section('content')
    <div class="bg-blue h-100">
        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-10">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="{{route('admin')}}">
                                    <img src="{{asset('assets/admin/images/logo.png')}}" alt="logo">
                                </a>
                            </div>
                            <div class="login-form shadow">
                                <h4>Administratior Login</h4>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" placeholder="Password">
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="form-check-label"> Remember Me</label>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                <label class="pull-right">
                                                    Forgotten Password?
                                                </label>
                                            </a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>

                                    <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
