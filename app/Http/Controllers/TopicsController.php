<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    //
    
    public function index(Request $request, Topic $topic)
    {
    	$topics = $topic->withOrder($request->order)
    					->with('user', 'category')
    					->paginate(20);
    	
    	return view('topics.index', compact('topics'));
    }
    
    public function show()
    {
    	return view('topics.show');
    }


    public function create()
    {
    	return view('topics.create_and_edit');
    }


    public function edit()
    {
    	return view('topics.create_and_edit');
    }
}
