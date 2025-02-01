<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\MenuChoice;
use App\Models\Outlet;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function main() {
        $menu_categories = MenuCategory::all();
        $outlets = Outlet::all();

        return view('order', [
            'menu_categories' => $menu_categories,
            'outlets' => $outlets
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
        $menu = Menu::findOrFail($menu_id);
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
            'menu' => $menu,
            'menu_choices_items' => $menu_choices_items
        ]);
    }

    public function order(Request $request) {
        $menu_category_id = $request['menu-category'];
        $menu_id = $request['menu'];
        $outlet_id = $request['outlet-position'];

        if (
            $request['menu-category'] && $request['menu'] && $request['outlet-position'] && $request['user-position']
        ) {
            $user_position = explode(',', $request['user-position']);

            $menu_choice_ids = [];
            foreach ($request->all() as $key => $parameter) {
                if (str_contains($key, 'menu-choice-')) {
                    array_push($menu_choice_ids, (int)$parameter);
                }
            }
    
            $menu_price = (int)$request['menu-price'];
            $delivery_price = (int)$request['delivery-price'];
            $total_price = $menu_price + $delivery_price;
    
            if ($total_price != (int)$request['total-price']) {
                return redirect()->route('order.main')->with('error', 'Total harga tidak sesuai!');
            } else {
                $order = Order::create([
                    'menu_category_id' => $menu_category_id,
                    'menu_id' => $menu_id,
                    'outlet_id' => $outlet_id,
                    'user_latitude' => $user_position[0],
                    'user_longitude' => $user_position[1],
                    'menu_choice_ids' => $menu_choice_ids,
                    'menu_price' => $menu_price,
                    'delivery_price' => $delivery_price,
                    'total_price' => $total_price
                ]);
                return view('order_payment', [
                    'order' => $order
                ]);
            }
        } else {
            return redirect()->route('order.main')->with('error', 'Data belum lengkap!');
        }

    }

    public function orderPayment() {
        return view('order_payment');
    }
}
