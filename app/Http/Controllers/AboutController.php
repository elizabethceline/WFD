<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $param1 = "Ini adalah about page";
        return view('about', ['title' => "About Us", 'param1' => $param1]);
    }
}
