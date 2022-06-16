<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class category extends Model
{
    use HasFactory;
    protected $guarded =[];


    public function Item()
    {
        return $this->hasMany(Item::class);
    }
}
