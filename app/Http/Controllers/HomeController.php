<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $display = "Display from Request <br>";
        $display .= "Parameter 1: " . $request->param1 . "<br>";
        if (isset($request->param2)) {
            $display .= "Parameter 2: " . $request->param2 . "<br>";
        }

        if (isset($request->param1)) {
            $param1 = $request->param1;
        } else {
            $param1 = "Ini adalah home page";
        }

        if (isset($request->param2)) {
            $param2 = $request->param2;
        } else {
            $param2 = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, reiciendis exercitationem sunt excepturi consectetur dolorum praesentium deserunt voluptates quidem et reprehenderit saepe vitae laudantium est perspiciatis optio labore, nemo illum!";
        }

        return view('home', ['title' => "Home", 'param1' => $param1, 'param2' => $param2]);
    }
}
