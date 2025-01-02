<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuChoice;

class MenuItem extends Model
{
    protected $fillable = [
        'name', 'menu_choice_id'
    ];

    public function menuChoice() {
        return $this->belongsTo(MenuChoice::class);
    }
}
