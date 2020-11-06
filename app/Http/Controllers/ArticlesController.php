<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class ArticlesController extends Controller
{

    public function getArticlesData(){
        $articles = Articles::all();
        return $articles;
    }

    public function checkArticlesData($id)
    {
        $isSuccess = false;
        $data = Articles::all()->contains($id);
        if ($data > 0) {
            $isSuccess = true;
        }

        return $isSuccess;
    }

    public function addArticlesData(Request $request)
    {
        $en = $request->en;
        $tc = $request->tc;
        $datetime = Carbon::now();
        $status = 'success';
        $message = '新增成功!';

        try {
            $articles = new Articles();
            $articles->en = $en;
            $articles->tc = $tc;
            $articles->created_at = $datetime;
            $articles->updated_at = new Date();
            $articles->save();
        } catch (Exception $e) {
            echo $e;
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
        $datetime = Carbon::now();
        $status = 'success';
        $message = '更新成功!';

        try {
            $check = $this->checkAticlesData($id);

            if ($check) {
                $articles = Articles::find($id);
                $articles->en = $en;
                $articles->tc = $tc;
                $articles->updated_at = $datetime;
                $articles->save();
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

    public function deleteAticlesData(Request $request){
        $id = $request->id;
        $status = 'success';
        $message = '刪除成功!';

        try {
            $check = $this->checkArticlesData($id);

            if ($check) {
                $articles = Aticles::find($id);
                $articles->delete();
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
