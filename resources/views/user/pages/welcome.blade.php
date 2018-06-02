@extends('user.layouts.master')

@section('title', '|| Homepage')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Hello to My Blog</h1>
            <p class="lead">Thank you so much for visiting. This is my test website build with Laravel. Please read
                my popular post!</p>
            <p><a href="#" class="btn btn-primary btn-lg" role="button">Popular Post</a></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="post">
            <h3>Title Post</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad adipisci amet atque autem corporis
                deleniti doloremque, et exercitationem hic magnam modi nam non numquam placeat quas sed ullam
                vel.</p>
            <a href="#" class="btn btn-primary">Read More</a>
        </div>
        <hr>
        <div class="post">
            <h3>Title Post</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad adipisci amet atque autem corporis
                deleniti doloremque, et exercitationem hic magnam modi nam non numquam placeat quas sed ullam
                vel.</p>
            <a href="#" class="btn btn-primary">Read More</a>
        </div>
        <hr>
        <div class="post">
            <h3>Title Post</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad adipisci amet atque autem corporis
                deleniti doloremque, et exercitationem hic magnam modi nam non numquam placeat quas sed ullam
                vel.</p>
            <a href="#" class="btn btn-primary">Read More</a>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h2>Slider</h2>
    </div>
</div>
@endsection
