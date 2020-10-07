<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function getCardData()
    {
        $title = '卡片狀態';
        // $data = {
        //     'name': 'apple'
        // };

        return view('counties', [
            'title' => $title
        ]);
    }
}
