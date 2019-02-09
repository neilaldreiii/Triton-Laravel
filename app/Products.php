<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
    public function addOrder($order)
    {
        $this->orders()->create($order);
    }
}
