<?php

namespace App;

use App\Events\ProductUpdated;
use App\Events\ProductUpdating;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $dispatchesEvents = [
        'updated' => ProductUpdated::class,
    ];
}
