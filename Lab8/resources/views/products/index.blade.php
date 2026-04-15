@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Products Catalog</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    </div>

    <div class="card card-stat">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="productsTable" class="table table-striped table-hover mb-0 align-middle w-100">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th class="text-end">Price</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if ($product->image_path)
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="rounded" width="48" height="48" style="object-fit: cover;">
                                    @else
                                        <span class="badge text-bg-secondary">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td class="text-end">${{ number_format($product->price, 2) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(function () {
            $('#productsTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [[0, 'desc']],
                columnDefs: [
                    { orderable: false, targets: [1, 5] },
                    { searchable: false, targets: [1, 5] },
                ],
            });
        });
    </script>
@endpush
