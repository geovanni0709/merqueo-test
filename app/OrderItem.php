<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class OrderItem
 */
final class OrderItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'order_item';

    /**
     * @var array
     */
    protected $guarded = [];
}