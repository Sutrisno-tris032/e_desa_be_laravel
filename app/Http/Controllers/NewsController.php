<?php

namespace App\Http\Controllers;

use App\Models\Commentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    //
    public function getNewsList()
    {
        $news = DB::table('news')
            ->join('news_category', 'news.news_category', '=', 'news_category.id')
            ->select('news.id', 'news.news_title', 'news.news_tag', 'news.author', 'news.image', 'news.created_at', 'news_category.category_name')
            ->paginate(5);

        return response()->json($news);
    }

    public function getNewsDetail($id)
    {
        $news = DB::table('news')
            ->join('news_category', 'news.news_category', '=', 'news_category.id')
            ->select('news.id', 'news.news_title', 'news.news_description', 'news.news_tag', 'news.author', 'news.image', 'news.created_at', 'news_category.category_name')
            ->where('news.id', $id)
            ->first();

        return response()->json($news);
    }

    public function getCommentar($id)
    {
        $commentar = Commentar::where('news_id', $id)->get();

        return response()->json($commentar);
    }

    public function getRecentPost(Request $request)
    {

        $query = $request->input('search');
        $news = DB::table('news')
            ->select('news.id', 'news.news_title', 'news.created_at')
            ->where('news.news_title', 'like', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return response()->json($news);
    }
}
