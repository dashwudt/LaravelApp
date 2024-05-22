<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationSpot extends Model
{
    use HasFactory;

    // If you want to specify exactly which fields are mass assignable, you can use the $fillable array:
    protected $fillable = ['name', 'latitude', 'longitude'];
    // Alternatively, if you want to make all fields mass assignable except for those explicitly excluded, you can use the $guarded array:
    // protected $guarded = ['id'];

    public function wishList()
    {
        // Assuming each vacation spot can have many wish list entries
        return $this->hasMany(WishList::class);
    }
}
