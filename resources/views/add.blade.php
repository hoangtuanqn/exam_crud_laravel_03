@extends('layouts.master')
@section('title', 'Cập nhật dữ liệu')
@section('content')
    <main>
        <div class="content">
            <h1 class="title">Add data</h1>
            <div class="form dfcenter">
                <form action="/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Brand Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name"
                            class="@error('name') is-invalid @enderror" value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Manufacturer (Country):</label>
                        <input type="text" name="country" id="country" placeholder="Enter Country" 
                            class="@error('country') is-invalid @enderror" value="{{ old('country') }}" />
                        @error('country')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" id="logo" 
                            class="@error('logo') is-invalid @enderror" accept="image/*" />
                        @error('logo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="submit"></label>
                        <button type="submit" class="btn">Add new</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Find first input with 'is-invalid' class
            const firstInvalidInput = document.querySelector('.is-invalid');

            // If error input exists, focus on it
            if (firstInvalidInput) {
                firstInvalidInput.focus();
            }
        });
    </script>
@endsection
