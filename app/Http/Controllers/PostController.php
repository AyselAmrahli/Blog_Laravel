<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Category;
use Session;

class PostController extends Controller
{

   public function __construct(){
     $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All data
        $posts = Post::orderBy('id','desc')->paginate(5);
        // return view
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request);
        //validate for posts
        $this->validate($request,[
          'title' => 'required|max:255',
          'slug'=>'required|alpha_dash|min:5|max:255',
          'category_id'=>'required|integer',
          'body' => 'required'
        ]);

        //save my posts
        $post = new Post;
        $post->title = $request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body = $request->body;

        $post->save();

        $post->tags()->sync($request->tags,false);

        Session::flash('success','Blog Post created successfully');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //find all data with id
        $post = Post::find($id);
        $categories=Category::all();
        $tags = Tag::all();
        $cats = [];
        $tagsArray = [];
        foreach ($categories as $category) {
          $cats[$category->id] = $category->name;
        }
        foreach ($tags as $tag) {
          $tagsArray[$tag->id] = $tag->name;
        }
        // return view
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tagsArray);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $post = Post::find($id);
        //validate
        if ($request->input('slug') == $post->slug) {
          $this->validate($request,[
            'title'=>'required|max:255',
            'category_id'=>'required|integer',
            'body'=> 'required'
          ]);
        }else{
          $this->validate($request,[
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=> 'required'
          ]);
        }

        // update to DB
        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body  = $request->input('body');
        $post->update();
        //set flash data
        if (isset($request->tags)) {
          $post->tags()->sync($request->tags);
        }else{
          $post->tags()->sync(array());
        }

        Session::flash('success','Post successfully updated');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find posts with $id
        $post = Post::find($id);

        //delete data from database
        $post->delete();

        //set flash message
        Session::flash('success','Post deleted successfully');

        //redirect
        return redirect()->route('posts.index');
    }
}
