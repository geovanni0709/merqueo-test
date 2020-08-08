<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class CustomerAddress
 */
final class CustomerAddress extends Model
{
    /**
     * @var string
     */
    protected $table = 'customer_address';

    /**
     * @var array
     */
    protected $guarded = [];
}