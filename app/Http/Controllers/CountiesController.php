<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class CountiesController extends Controller
{
    public function getCountiesData()
    {
        $counties = Config::get('counties');
        $countiesData = [
            'city' => $counties['city'],
            'districts' => $counties['districts']
        ];

        return view('counties', $countiesData);
    }
}
