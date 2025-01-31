<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavSubItem extends Model
{
    use HasFactory;
    Protected $guarded = [];
    public function navbar(){
        return $this->hasMany(NavBar::class,'navbar_id');
    }
}
