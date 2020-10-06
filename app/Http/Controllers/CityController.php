<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class CityController extends Controller
{
    public function getCityData()
    {
        $city = Config::get('city');
        $cityData = [
            'county' => $city['county'],
            'districts' => $city['districts']
        ];

        return view('city', $cityData);
    }
}
