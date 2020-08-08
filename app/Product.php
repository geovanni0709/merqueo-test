<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Product
 */
final class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $guarded = [];
}