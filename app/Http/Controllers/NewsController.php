<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function getNewsList(){
        $news = \App\Models\News::paginate(5);

        return response()->json($news);
    }
}
