<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
		if ($request->type == 'posts'){
			$post = new Post;
			$post->user_id  = Auth::user()->id;
			$post->title    = $request->title;
			$post->content  = $request->content;
			$post->save();
			return redirect()
				->route('articles.show', $post->id)
				->with(compact('post'));
		}
		if($request->type == 'comments'){
			$comment = new Comment;
			$comment->posts_id = $request->id;
			$comment->user_id  = Auth::user()->id;
			$comment->content  = $request->content;
			$comment->save();
			return redirect()
            ->route('articles.show', $request->id);
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
			$comment = Comment::where('posts_id', '=', $id)->get();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
