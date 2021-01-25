<?php

namespace App;
use App\Item;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function item()
    {
    	return $this->hasMany(Item::class);
    }
}
