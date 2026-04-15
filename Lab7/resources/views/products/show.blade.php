@extends('layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Product Details</h1>
            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <strong>Name</strong>
                    <p class="mb-0">{{ $product->name }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Category</strong>
                    <p class="mb-0">{{ $product->category }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Price</strong>
                    <p class="mb-0">${{ number_format($product->price, 2) }}</p>
                </div>
                <div class="col-12">
                    <strong>Description</strong>
                    <p class="mb-0">{{ $product->description ?: 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
