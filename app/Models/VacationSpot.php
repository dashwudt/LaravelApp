<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationSpot extends Model
{
    public function wishList()
    {
        return $this->hasMany(WishList::class);
    }
    use HasFactory;
}
