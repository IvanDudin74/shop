<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController2 extends Controller
{
    public function __invoke() {
        return view('home');
    }
}
