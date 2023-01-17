<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            // 'posts' => Post::all()
            'active' => 'home',
            'posts' => Post::latest()->paginate(6)->withQueryString(),
            // 'posts' => Post::latest()->filter(request(['search', 'category']))->get(),

        ];
        return view('main',$data);
    }
    public function show(Post $post){
        if ($post->category->slug == 'sport') {
            $aktif = [
                'active' => 'sport'
            ];
        }else{
            $aktif = [
                'active' => 'social'
            ];
        }
        $data = [
            
            'posts' => $post,
            'comments' =>Comment::all()
        ];
        return view('blog',$data,$aktif);
    }
    public function search()
    {
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            if ($category->slug == 'sport') {
                $data = [
                    'search' => request('search'),
                    'active' => 'sport',
                    'posts' => Post::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString(),
        
                ];
                return view('sport',$data);
            } else {
                $data = [
                    'search' => request('search'),
                    'active' => 'social',
                    'posts' => Post::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString(),
        
                ];
                return view('social',$data);
            }
        } else{
            $data = [
                'search' => request('search'),
                'active' => 'home',
                'posts' => Post::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString(),
    
            ];
            return view('main',$data);
        }
    }
    public function postComment(Request $request){
        // dd($request->all());
        $comment = Comment::create($request->all());
        return redirect()->back()->with('success', 'Comment has been added');
    }
}
