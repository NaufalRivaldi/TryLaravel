<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homepage(){
    	return view('homepage', ['text'=>'Learning Laravel is Fun']);
    }
}
