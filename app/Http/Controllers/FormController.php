<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
    	return view('form');
    }

    public function post(Request $request){
    	$name = $request->input('name');
    	$request->session()->put('nameUser', $name);

    	return view('session')->with('name', $request->session()->get('nameUser'));
    }

    public function formval(){
    	return view('formval');
    }

    public function postval(Request $request){
    	print_r($request->input());

    	//validation
    	$request->validate([
    		'Name' => 'required | min:5',
    		'Pass' => 'required | max:10 | numeric'
    	]);
    }
}
