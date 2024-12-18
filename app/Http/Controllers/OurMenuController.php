<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurMenuController extends Controller
{
    public function main() {
        return view('ourmenu');
    }
}
