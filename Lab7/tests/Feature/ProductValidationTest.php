<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_store_requires_valid_payload(): void
    {
        $response = $this->post(route('products.store'), [
            'name' => 'A',
            'price' => -1,
            'category' => '',
            'description' => str_repeat('x', 2100),
        ]);

        $response
            ->assertSessionHasErrors(['name', 'price', 'category', 'description'])
            ->assertRedirect();
    }
}
