<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Purifier;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $selectCategory = [];
        foreach ($categories as $category) {
            $selectCategory[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $selectTag = [];
        foreach ($tags as $tag) {
            $selectTag[$tag->id] = $tag->name;
        }

        return view('admin.posts.create', ['categories' => $selectCategory, 'tags' => $selectTag]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'category' => 'required|integer',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags, false);

        return redirect()->route('posts.index')
            ->with('success', 'The blog post was successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $selectCategory = [];
        foreach ($categories as $category) {
            $selectCategory[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $selectTag = [];
        foreach ($tags as $tag) {
            $selectTag[$tag->id] = $tag->name;
        }

        return view('admin.posts.edit',
            ['post' => $post, 'categories' => $selectCategory, 'tags' => $selectTag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'category' => 'required|integer',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category;
        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }

        return redirect()->route('posts.show', $post->id)
            ->with('success', 'This post was successfully saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'This post was successfully deleted!');
    }
}
