<?php

namespace App\Http\Controllers;

use App\Models\Commentar;
use Illuminate\Http\Request;

class CommenttaryController extends Controller
{
    //
    public function postCommentary()
    {
        try {
            $comment = new Commentar();
            $comment->news_id = request('news_id');
            $comment->author_name = request('author_name');
            $comment->author_email = request('author_email');
            $comment->commentar = request('comment');
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dikirim.',
                'data' => $comment,
            ], 201); // HTTP status 201: Created
        } catch (\Exception $e) {
            // Berikan respons error jika terjadi kesalahan
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim komentar. ' . $e->getMessage(),
            ], 500); // HTTP status 500: Internal Server Error
        }
    }
}
