<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'location', 'description', 'image'];
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
