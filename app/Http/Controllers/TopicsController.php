<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Http\Requests\TopicRequest;
use Auth;


class TopicsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except'	=>	['index', 'show']]);
	}
    
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


    public function create(Topic $topic, Category $category)
    {
    	$categories = $category->categories();
    	return view('topics.create_and_edit', compact('topic', 'categories'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
    	$topic->fill($request->all());

    	$topic->user_id = Auth::id();

    	$topic->save();

    	return redirect()->route('topics.show', $topic->id)->with('success', '帖子创建成功！');


    }


    public function edit()
    {
    	return view('topics.create_and_edit');
    }
}
