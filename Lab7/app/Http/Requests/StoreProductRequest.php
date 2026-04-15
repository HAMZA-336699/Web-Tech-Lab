<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:9999999.99'],
            'description' => ['nullable', 'string', 'max:2000'],
            'category' => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please provide a product name.',
            'name.min' => 'Product name must be at least 3 characters.',
            'price.required' => 'Please provide a price.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'category.required' => 'Please provide a category.',
            'description.max' => 'Description cannot exceed 2000 characters.',
        ];
    }
}
