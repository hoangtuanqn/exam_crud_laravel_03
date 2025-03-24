@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <main>
        <div class="content">
            <h1 class="title">Login</h1>
            <div class="form dfcenter">
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username"
                            class="@error('username') is-invalid @enderror" value="{{ old('username') }}" />
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" 
                            class="@error('password') is-invalid @enderror" />
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="submit"></label>
                        <button type="submit" class="btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const firstInvalidInput = document.querySelector('.is-invalid');
            if (firstInvalidInput) {
                firstInvalidInput.focus();
            }
        });
    </script>
@endsection
