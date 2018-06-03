<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(4)->get();

        return view('user.pages.welcome', ['posts' => $posts]);
    }

    public function getAbout()
    {
        $name = 'NamDev';
        $email = 'namdevdk2710@gmail.com';

        return view('user.pages.about', ['name' => $name, 'email' => $email]);
    }

    public function getContact()
    {
        return view('user.pages.contact');
    }

    public function postContact()
    {
        return view('user.pages.contact');
    }
}
