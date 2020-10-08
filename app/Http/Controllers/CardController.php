<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class CardController extends Controller
{
    public function getCardData()
    {
        $card = Config::get('card');
        
        return [
            'items' => $card['items'],
            'cardItems' => $card['cardItems'],
        ];
    }
}
