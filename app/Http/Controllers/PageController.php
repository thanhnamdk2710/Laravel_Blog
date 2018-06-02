<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        return view('user.pages.welcome');
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
