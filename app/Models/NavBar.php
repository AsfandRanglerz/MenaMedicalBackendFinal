<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    use HasFactory;
    Protected $guarded = [];
    public function navItems(){
        return $this->hasMany(NavSubItem::class,'navbar_id');
    }
}
