<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostMiningController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Post Mining',
        ];

        return view('post-mining', $data);
    }
}
