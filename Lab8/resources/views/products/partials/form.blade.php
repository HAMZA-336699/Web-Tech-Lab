@php
    $boundProduct = $product ?? null;
@endphp

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input
        type="text"
        id="name"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $boundProduct?->name) }}"
        required
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input
        type="number"
        step="0.01"
        min="0"
        id="price"
        name="price"
        class="form-control @error('price') is-invalid @enderror"
        value="{{ old('price', $boundProduct?->price) }}"
        required
    >
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <input
        type="text"
        id="category"
        name="category"
        class="form-control @error('category') is-invalid @enderror"
        value="{{ old('category', $boundProduct?->category) }}"
        required
    >
    @error('category')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea
        id="description"
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        rows="4"
    >{{ old('description', $boundProduct?->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Product Image</label>
    <input
        type="file"
        id="image"
        name="image"
        class="form-control @error('image') is-invalid @enderror"
        accept="image/png,image/jpeg,image/jpg,image/webp"
    >
    <div class="form-text">Accepted formats: JPG, PNG, WEBP. Max size: 2MB.</div>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if ($boundProduct?->image_path)
        <div class="mt-3">
            <p class="small text-secondary mb-2">Current Image</p>
            <img
                src="{{ asset('storage/' . $boundProduct->image_path) }}"
                alt="{{ $boundProduct->name }}"
                width="120"
                class="rounded border"
                style="object-fit: cover;"
            >
        </div>
    @endif
</div>
