<?php

namespace App\Http\Controllers;

use App\Models\Multipic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }
}
