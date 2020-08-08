<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Provider
 */
final class Provider extends Model
{
    /**
     * @var string
     */
    protected $table = 'provider';

    /**
     * @var array
     */
    protected $guarded = [];
}