<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Support\Facades\Log;

class LogProductCreation
{
    public function handle(ProductCreated $event): void
    {
        Log::channel('daily')->info('Product was created.', [
            'product_id' => $event->product->id,
            'name' => $event->product->name,
            'category' => $event->product->category,
            'price' => $event->product->price,
            'created_at' => $event->product->created_at?->toDateTimeString(),
        ]);
    }
}
