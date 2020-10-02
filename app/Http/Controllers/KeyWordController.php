<?php

namespace App\Http\Controllers;

use App\Models\KeyWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KeyWordController extends Controller
{
    public function getKeyWordData(){
        $keywords = KeyWord::get();
        
        return view('keywords', ['keywords' => $keywords]);
    }

    public function updateData(Request $request){
        $keyword = KeyWord::get();
        
        return view('keyword', $keyword);
    }

    public function addData(Request $request)
    {
        $english_name = $request->input('english_name');
        $chinese_name = $request->input('chinese_name');
        $datetime = Carbon::now()->toDateTimeString();
        $isAdd = false;

        try {
            KeyWord::insert([
                'english_name' => $english_name, 
                'chinese_name' => $chinese_name,
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]);

            $isAdd = true;
        } catch (Exception $e) {
            dd($e);
        }
        
        return $isAdd;
    }

}
