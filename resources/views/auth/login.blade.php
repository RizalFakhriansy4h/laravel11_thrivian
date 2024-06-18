@extends('layouts.template_login')
@section('title', 'Login')
@section('content')


    <div class="header-text mb-4 text-center">
        <small>Don't have an account? <a href="{{ route('register') }}" id="showSignUp">Sign Up</a></small>
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-group mb-3 mx-auto" style="width: 400px;">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <div class="form-floating">
                <input type="email" class="form-control" id="emailInput" placeholder="Email Address" name="email" value="{{ old('email') }}">
                <label for="Email">Email</label>
            </div>
        </div>

        <div class="input-group mb-3 mx-auto" style="width: 400px;">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <div class="form-floating">
                <input type="password" class="form-control" id="passwordInput" placeholder="Password" name="password">
                <label for="Password">Password</label>
            </div>
        </div>
        <div class="input-group mb-3 mx-auto" style="width: 400px">
            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" style="border-radius: 30px;">Login</button>
        </div>
    </form>
    
@endsection