<?php

namespace App\Http\Controllers;

use App\Models\KeyWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class KeyWordController extends Controller
{
    public function getKeyWordView(){
        return view('keyword');
    }

    public function index(Request $request){
        $perPage = 5;
        $page = (int)$request->page;
        $from= ($page * $perPage) - ($perPage - 1);
        $keyword = KeyWord::all()->splice($from, $perPage);
        $total = KeyWord::count();
        $response = [
            'pagination' => [
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'from' => $from,
                'to' => $page * $perPage
            ],
            'keyword' => $keyword, 'add' => route('addKeyWord'), 'update' => route('updateKeyWord'),
            'delete' => route('deleteKeyWord')
        ];

        return response()->json($response);
    }

    public function addKeyWordData(Request $request)
    {
        $english_name = $request->english_name;
        $chinese_name = $request->chinese_name;
        $datetime = Carbon::now()->toDateTimeString();
        $status = 'success';
        $message = '新增成功!';

        try {
            KeyWord::insert([
                'english_name' => $english_name, 
                'chinese_name' => $chinese_name,
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]);
        } catch (Exception $e) {
            $status = 'error';
            $message = '新增失敗!';
        }
        
        return [ 
            'status' => $status,
            'message' => $message 
        ];
    }

    public function updateKeyWordData(Request $request){
        $english_name = $request->english_name;
        $chinese_name = $request->chinese_name;
        $datetime = Carbon::now()->toDateTimeString();
        $status = 'success';
        $message = '更新成功!';

        $data = [
            'english_name' => $english_name,
            'chinese_name' => $chinese_name,
            'updated_at' => $datetime
        ];

        try {
            KeyWord::where('_id', $request->id)->update($data);
        } catch (Exception $e) {
            $status = 'error';
            $message = ' 更新失敗!';
        }
        
        return [
            'status' => $status,
            'message' => $message 
        ];
    }

    public function deleteKeyWordData(Request $request){
        $datetime = Carbon::now()->toDateTimeString();
        $status = 'success';
        $message = '刪除成功!';

        try {
            KeyWord::where('_id', $request->id)->delete();
        } catch (Exception $e) {
            $status = 'error';
            $message = '刪除失敗!';
        }
        
        return [
            'status' => $status,
            'message' => $message
        ];
    }

}
