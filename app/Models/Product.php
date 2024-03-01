<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['quantity'];

    /**
     * Get the initial product quantity.
     */
    protected function quantity(): Attribute
    {
        return Attribute::make(
            get: fn () => 1,
        );
    }
}
