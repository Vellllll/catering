<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function main() {
        $banner = DB::select('select image_url from banners order by id desc limit 1');
        $testimonials = DB::select('select * from testimonials order by id desc limit 4');
        return view(
            'dashboard',
            [
                'banner' => $banner,
                'testimonials' => $testimonials
            ]
        );
    }
}
