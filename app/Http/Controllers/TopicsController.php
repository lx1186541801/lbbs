<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicsController extends Controller
{
    //
    
    public function index()
    {
    	return view('topics.index');
    }
    
    public function show()
    {
    	return view('topics.show');
    }


    public function create()
    {
    	return view('topics.createAndEdit');
    }


    public function edit()
    {
    	return view('topics.createAndEdit');
    }
}
