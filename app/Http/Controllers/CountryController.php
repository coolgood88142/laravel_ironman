<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class CountryController extends Controller
{
    public function getCountryData()
    {
        $country = Config::get('country');
        $countryData = [
            'city' => $country['city'],
            'districts' => $country['districts']
        ];

        return view('country', $countryData);
    }
}
