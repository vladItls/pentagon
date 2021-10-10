<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    protected $fillable = [
        'id',
        'total',
        'shipping_total',
        'create_time',
        'timezone',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'create_time' => 'datetime',
    ];
}
