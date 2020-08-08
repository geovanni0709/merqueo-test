<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class ProviderProduct
 */
final class ProviderProduct extends Model
{
    /**
     * @var string
     */
    protected $table = 'provider_product';

    /**
     * @var array
     */
    protected $guarded = [];
}