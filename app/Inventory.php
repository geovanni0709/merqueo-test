<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Inventory
 */
final class Inventory extends Model
{
    /**
     * @var string
     */
    protected $table = 'inventory';

    /**
     * @var array
     */
    protected $guarded = [];
}