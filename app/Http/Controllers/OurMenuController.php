<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MenuCategory;

class OurMenuController extends Controller
{
    public function main() {
        $menu_categories = MenuCategory::all();

        return view(
            'ourmenu',
            [
                'menu_categories' => $menu_categories
            ]
        );
    }
}
