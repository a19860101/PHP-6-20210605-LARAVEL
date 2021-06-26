<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //
    function index(){
        // $posts = Post::all();
        $posts = Post::orderBy('id','DESC')->get();
        // return view('post.index')->with(['posts'=>$posts]);
        // return view('post.index',['posts'=>$posts]);
        return view('post.index',compact('posts'));
    }
    function create(){
        // $categories = \App\Category::get();
        $categories = Category::get();


        return view('post.create',compact('categories'));
    }
    function store(Request $request){
        // 方法一
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        //方法二
        // $post = new Post;
        // $post->fill([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);
        // $post->save();

        //方法三
        // $post = new Post;
        // $post->fill($request->all());
        // $post->save();

        // 方法四
        // Post::create($request->all());


        // return $request->file('cover')->store('test','public');
        // return $request->file('cover')->storeAs('images','qwerty.jpg');
        // return $request->file('cover')->storeAs('images','qwerty.jpg','public');


        if($request->file('cover')){
            $ext = $request->file('cover')->getClientOriginalExtension();
            $cover = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$cover,'public');
        }else{
            $cover = null;
        }

        $post = new Post;
        $post->fill($request->all());
        $post->cover = $cover;
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        $post->save();

        $tags = explode(',',$request->tag);

        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title'=>$tag]);
            $post->tags()->attach($tagModel -> id);
        }

        // return redirect('/post');
        return redirect()->route('post.index');
    }
    function show(Post $post){
        // $post = Post::find($post);
        return view('post.show',compact('post'));
    }
    function edit(Post $post){
        $categories = Category::get();
        return view('post.edit',compact('post','categories'));
    }
    function update(Post $post, Request $request){
        
        $post->fill($request->all());
        $post->category_id = $request->category_id;
        //----------------------------------------------------
        // $post->fill([
        //     'title' => $request->title,
        //     'content' =>$request->content
        // ]);
        //----------------------------------------------------
        // $post->title = $request->title;
        // $post->content =$request->content;
        
        $post->tags()->detach();
        $tags = explode(',',$request->tag);
        foreach($tags as $tag){
            $tagModel = Tag::firstOrCreate(['title'=>$tag]);
            $post->tags()->attach($tagModel->id);
        }

        $post->save();
        // return redirect()->route('post.show',['post'=>$post->id]);
        return redirect()->route('post.show',compact('post'));
    }
    function delete(Post $post){

        
        // Post::destroy($post->id);
        $post->delete();

        // return redirect('/post');
        return redirect()->route('post.index');
    }
    function upload(){
        $ext = request()->file('file')->getClientOriginalExtension();
        $img = Str::uuid().'.'.$ext;
        request()->file('file')->storeAs('images',$img,'public');
        return response()->json(['location' => '/storage/images/'.$img]);
    }

    function postWithCategory(Category $category){

        $posts = Post::where('category_id',$category->id)->orderBy('updated_at','DESC')->get();

        // return $posts;
        // $posts = $category->posts;
        return view('post.postCategory',compact('posts'));
    }
    function postWithUser(User $user){
        $posts = $user->posts;
        return view('post.postUser',compact('posts'));
    }
}
