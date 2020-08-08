<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Customer
 */
final class Customer extends Model
{
    /**
     * @var string
     */
    protected $table = 'customer';

    /**
     * @var array
     */
    protected $guarded = [];
}