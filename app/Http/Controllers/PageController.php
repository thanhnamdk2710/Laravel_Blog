<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;

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

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);
        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('namdevdk2710@gmail.com');
            $message->subject($data['subject']);
        });

        return redirect()->route('contact')->with('success', 'Send Your Message Successfully!');
    }
}
