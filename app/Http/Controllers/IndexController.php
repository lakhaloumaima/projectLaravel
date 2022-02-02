<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function home () {
        return view('home') ;
    }
    public function show ($id) {
        return 'User ID : '.$id ;
    }
}
