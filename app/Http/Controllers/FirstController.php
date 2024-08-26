<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index()
    {
        return "Hi, nama saya first controller";
    }

    public function index2(Request $request)
    {
        $display = "Display from Request: " . $request->param;
        return $display;
    }

    public function index3(Request $request)
    {
        $display = "Display from Request: " . $request->param;
        return $display;
    }

    public function index4(Request $request)
    {
        $display = "Display from Request <br>";
        $display .= "Parameter 1: " . $request->param1 . "<br>";
        if (isset($request->param2)) {
            $display .= "Parameter 2: " . $request->param2 . "<br>";
        }
        return $display;
    }
}
