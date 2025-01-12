<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MenuCategory;
use App\Models\Menu;

class OurMenuController extends Controller
{
    public function main($menu_id) {
        $menu_categories = MenuCategory::all();
        $menu = Menu::findOrFail($menu_id);

        return view(
            'ourmenu',
            [
                'menu_categories' => $menu_categories,
                'menu' => $menu
            ]
        );
    }
}
