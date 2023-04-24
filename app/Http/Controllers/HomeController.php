<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    
    /**
     * @Handle an incoming request show page
     * @return view('home)
     */
    function index()
    {
        return view('home');
    }
}
