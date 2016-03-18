<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class AdminController extends Controller
{
	
 
    public function index()
    {
        return view('admin.index'); 
		
    }
	
    public function show($id)
    {
		if ($id == 'articles') {
			try{
				$posts = Post::all();
				return view('admin.show')->with(compact('posts', 'id'));
			}catch(\Exception $e) {
				return redirect()->route('admin.index')->with(['erreur' => 'Oooooooppppsssssss !!']);
			}
		}
		elseif ($id == 'projets') {
			return 'projets';
			
		}
		elseif ($id == 'comments') {
			try{
				$comments = Comment::all();
				return view('admin.show')->with(compact('comments' , 'id'));
			}catch(\Exception $e) {
				return redirect()->route('admin.index')->with(['erreur' => 'Oooooooppppsssssss !!']);
			}
			
		}
		
    }	
	

}
