<?php

namespace Tests\Feature;

use App\Events\ProductCreated;
use App\Listeners\LogProductCreation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ProductEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_created_event_is_dispatched_when_product_is_stored(): void
    {
        Event::fake();

        $payload = [
            'name' => 'Laptop',
            'price' => 1500,
            'category' => 'Electronics',
            'description' => 'Developer machine',
        ];

        $response = $this->post(route('products.store'), $payload);

        $response
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name' => 'Laptop',
            'category' => 'Electronics',
        ]);

        Event::assertDispatched(ProductCreated::class, function (ProductCreated $event): bool {
            return $event->product->name === 'Laptop';
        });
    }

    public function test_product_created_listener_is_registered(): void
    {
        Event::fake();

        Event::assertListening(ProductCreated::class, LogProductCreation::class);
    }
}
