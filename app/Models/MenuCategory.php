<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class MenuCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
