<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class KeywordController extends Controller
{
    public function getKeywordView(){
        return view('keyword');
    }

    public function index(Request $request){
        $perPage = 5;
        $page = (int)$request->page;
        $from= ($page * $perPage) - ($perPage - 1) - 1;
        $keyword = Keyword::all()->splice($from, $perPage);
        $total = Keyword::count();
        $response = [
            'pagination' => [
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
                'from' => $from,
                'to' => $page * $perPage
            ],
            'keyword' => $keyword, 'add' => route('addKeyword'), 'update' => route('updateKeyword'),
            'delete' => route('deleteKeyword')
        ];

        return response()->json($response);
    }

    public function checkKeywordData($id)
    {
        $isSuccess = false;
        $data = Keyword::all()->contains($id);
        if ($data > 0) {
            $isSuccess = true;
        }

        return $isSuccess;
    }

    public function addKeywordData(Request $request)
    {
        $en = $request->en;
        $tc = $request->tc;
        $datetime = Carbon::now()->toDateTimeString();
        $status = 'success';
        $message = '新增成功!';

        try {
            Keyword::insert([
                'en' => $en, 
                'tc' => $tc,
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

    public function updateKeywordData(Request $request){
        $id = $request->id;
        $en = $request->en;
        $tc = $request->tc;
        $datetime = Carbon::now()->toDateTimeString();
        $status = 'success';
        $message = '更新成功!';

        $data = [
            'en' => $en,
            'tc' => $tc,
            'updated_at' => $datetime
        ];
        

        try {
            $check = $this->checkKeywordData($id);

            if ($check) {
                Keyword::where('_id', $id)->update($data);
            } else {
                $status = 'error';
                $message = '更新失敗!';
            }
            
        } catch (Exception $e) {
            echo $e;
        }
        
        return [
            'status' => $status,
            'message' => $message 
        ];
    }

    public function deleteKeywordData(Request $request){
        $id = $request->id;
        $datetime = Carbon::now()->toDateTimeString();
        $status = 'success';
        $message = '刪除成功!';

        try {
            $check = $this->checkKeywordData($id);

            if ($check) {
                Keyword::where('_id', $id)->delete();
            } else {
                $status = 'error';
                $message = '刪除失敗!';
            }

        } catch (Exception $e) {
            echo $e;
        }
        
        return [
            'status' => $status,
            'message' => $message
        ];
    }

}
