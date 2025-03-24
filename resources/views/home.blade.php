@extends('layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <main>
        <div class="content">
            <h1 class="title">Customer Infomation List</h1>
            <div class="button-action">
                <a href="/add" class="link-action">Add New</a>
                <div class="search-wrapper">
                    <form method="POST" action="{{ route('index') }}" class="search-form">
                        @csrf
                        <input type="text" name="keyword" placeholder="Enter brand name" value="{{ old('keyword') }}">
                        <button type="submit" class="btn-search">Search</button>
                    </form>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="table-data">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($listBrand as $key => $brand)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->country }}</td>
                                <td>
                                    <img src="/{{ $brand->logo }}" alt="{{ $brand->name }}" class="image_brand"/>
                                </td>
                                <td class="action">
                                    <a href="{{ route('edit', ['id' => $brand->pbid]) }}">Modify</a> |
                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                        href="{{ route('delete', ['id' => $brand->pbid]) }}">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center">
                                    No data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
