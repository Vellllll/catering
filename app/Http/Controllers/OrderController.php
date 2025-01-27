<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\MenuChoice;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function main() {
        $menu_categories = MenuCategory::all();

        return view('order', [
            'menu_categories' => $menu_categories
        ]);
    }

    public function orderMenus(Request $request) {
        $menu_category_id = $request->input('menu_category_id');
        $menus = Menu::where('menu_category_id', $menu_category_id)->get();

        return response()->json([
            'menus' => $menus
        ]);
    }

    public function orderMenuChoices(Request $request) {
        $menu_id = $request->input('menu_id');
        $menu_choices = MenuChoice::where('menu_id', $menu_id)->get();

        $menu_choices_items = [];

        foreach ($menu_choices as $menu_choice) {
            array_push($menu_choices_items, [
                'id' => $menu_choice->id,
                'name' => $menu_choice->name,
                'items' => $menu_choice->menuItems
            ]);
        }

        return response()->json([
            'menu_choices_items' => $menu_choices_items
        ]);
    }
}
