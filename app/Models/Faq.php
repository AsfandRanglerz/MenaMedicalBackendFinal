<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'questions',
        'answers',
        'navBar_id',
        'navbar_name'
    ];

    public function navBar()
    {
        return $this->belongsTo(NavBar::class, 'navBar_id', 'id');
    }


}
