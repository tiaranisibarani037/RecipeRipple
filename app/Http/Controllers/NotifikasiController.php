<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function show()
    {
        // Ambil semua komentar beserta data user terkait
        // $comments = Comment::with('user')->get();
        $unreads = Comment::with('user')
        ->where('isRead', 0)
        ->get();
        
        $reads = Comment::with('user')
        ->where('isRead', 1)
        ->get();
    
        $unreadCount = Comment::where('isRead', 0)->count();
        // Kirim data komentar ke view
        return view('notifikasiPage', [
            'unreads' => $unreads,
            'reads' => $reads,
            'counts' => $unreadCount
        ]);
    }

    public function read($id)
    {
        // Cari komentar berdasarkan ID
        $comment = Comment::find($id);

        // Jika komentar ditemukan, ubah isRead menjadi 1
        if ($comment) {
            $comment->isRead = 1;
            $comment->save();
        }

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('recipe.show');
    }

    public function readed()
    {
        return redirect()->route('recipe.show');
    }
    
}
