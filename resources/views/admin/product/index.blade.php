@extends('layouts.admin')

@section('content')
    <h1>This is Products</h1>
    <a href="{{ route('admin.product.create') }}">Create Product</a>
@endsection
