<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class PagesController extends Controller
{
    public function welcome()
    {
        $vendors = Vendor::select('logo')->inRandomOrder()->limit(4)->get();
        return view('welcome', compact('vendors'));
    }
}
