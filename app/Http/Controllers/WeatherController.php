<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('pages.weather');
    }

    public function input(Request $request)
    {
        $appid = '83101c270eb2ccb7786ccfda29cddc82';
        $city = $request->city;

        $resp = Http::get('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=' . $appid);

        $data = json_decode($resp->body());

        // print_r(json_decode($data));
        return view('pages.weather_detail', compact('data'));
    }
}
