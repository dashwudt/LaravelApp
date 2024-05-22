<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    // Specify mass assignable attributes
    protected $fillable = ['user_id', 'vacation_spot_id'];

    /**
     * Get the user that owns the wish list item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the vacation spot that the wish list item refers to.
     */
    public function vacationSpot()
    {
        return $this->belongsTo(VacationSpot::class);
    }
}
