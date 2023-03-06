<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    public function about()
    {
        return view('Home.about');
    }

    public function contact()
    {
        return view('Home.contact');
    }

    public function login()
    {
        return view('Home.login');
    }
}
