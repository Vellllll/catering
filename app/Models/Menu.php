<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuChoice;
use App\Models\MenuCategory;

class Menu extends Model
{
    protected $fillable = [
        'name', 'picture_url', 'menu_category_id' 
    ];

    public function menuChoices() {
        return $this->belongsToMany(
            MenuChoice::class,
            'menu_choices_menus',
            'menu_id',
            'menu_choice_id'
        );
    }

    public function menuCategory() {
        return $this->belongsTo(
            MenuCategory::class
        );
    }
}
