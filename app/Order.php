<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Order
 */
final class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'order';

    /**
     * @var array
     */
    protected $guarded = [];
}