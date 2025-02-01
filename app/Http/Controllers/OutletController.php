<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function getOutletLocation(Request $request) {
        $outlet_id = $request->input('outlet_id');

        $outlet = Outlet::findOrFail($outlet_id);
        return response()->json([
            'outlet' => $outlet
        ]);
    }
}
