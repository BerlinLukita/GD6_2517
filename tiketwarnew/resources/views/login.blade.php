@extends('layouts.main')

@section('title', 'Login Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1 class="h4 mb-3">Login Admin</h1>

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata sandi</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Masuk</button>
            </form>
        </div>
    </div>
@endsection