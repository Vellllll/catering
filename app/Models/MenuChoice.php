<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItem;

class MenuChoice extends Model
{
    protected $fillable = [
        'name'
    ];

    public function menus() {
        return $this->belongsToMany(
            Menu::class,
            'menu_choices_menus',
            'menu_choice_id',
            'menu_id'
        );
    }

    public function menuItems() {
        return $this->hasMany(MenuItem::class);
    }
}
