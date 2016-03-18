<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;
use App\Http\Requests\ValidatePostRequest;
use App\Http\Requests\ValidateComRequest;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	
	public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = Post::all();
        return view('articles.index')->with(compact('posts'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->lists('name', 'id');
        return view('articles.create')->with(compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request1)
    {
		if($request1->type == 'comments'){
			$comment = new Comment;
			$comment->post_id = $request1->id;
			$comment->user_id  = Auth::user()->id;
			$comment->content  = $request1->content;
			
			$request = new Requests\ValidateComRequest;
			$this->validate($request1, $request->rules());
			
			$comment->save();
			
			return redirect()
            ->route('articles.show', $request1->id);
		}
		else {
			$post = new Post;
			$post->user_id  = Auth::user()->id;
			$post->title    = $request1->title;
			$post->content  = $request1->content;
			
			$request = new Requests\ValidatePostRequest;
			$this->validate($request1, $request->rules());
			
			$post->save();
			return redirect()
				->route('articles.show', $post->id)
				->with(compact('post'));
		}		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try{
            $post = Post::findOrFail($id);
			$comment = Comment::where('post_id', '=', $id)->get();
            return view('articles.show')->with(compact('post', 'comment'));
        }catch(\Exception $e) {
            return redirect()->route('articles.index')->with(['erreur' => 'Oooooooppppsssssss !!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post   = Post::find($id);
        $users  = User::all()->lists('name', 'id')  ;
        return view('articles.edit')->with(compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title   = $request->title;
        $post->content = $request->content;
        //$post->user_id = $request->user_id;
        $post->update();
        return redirect()->route('articles.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
		if ($request->type == 'post') {
			$post = Post::find($id);
			$post->delete();
			return redirect()->route('admin.index');
		}
		elseif ($request->type == 'comment') {
			$comment = Comment::find($id);
			$comment->delete();
			return redirect()->route('admin.index');
		}
    }
}
