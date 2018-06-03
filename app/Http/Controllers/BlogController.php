<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        return view('user.blog.index', ['posts' => $posts]);
    }

    public function getSingle($slug)
    {
        $post = Post::whereSlug($slug)->first();
        if ($post) {
            return view ('user.blog.single', ['post' => $post]);
        }
    }
}
