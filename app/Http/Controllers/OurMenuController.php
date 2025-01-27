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

        if ($menu_id) {
            $menu = Menu::findOrFail($menu_id);
        } else {
            $menu = Menu::first();
        }

        return view(
            'ourmenu',
            [
                'menu_categories' => $menu_categories,
                'menu' => $menu
            ]
        );
    }
}
