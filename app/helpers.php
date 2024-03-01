<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (! function_exists('generate_fake_product_name')) {
    function generate_fake_product_name(): string
    {
        return Str::ucfirst(Arr::random(config('fake-products.names')) . ' ' . Arr::random(config('fake-products.brands')));
    }
}
