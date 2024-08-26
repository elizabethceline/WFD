<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $param1 = "Ini adalah post page";
        return view('post', ['title' => "Post", 'param1' => $param1]);
    }
}
