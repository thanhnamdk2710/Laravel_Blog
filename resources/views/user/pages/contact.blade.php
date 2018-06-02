@extends('user.layouts.master')

@section('title', '|| Contact')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>About Us</h1>
        <hr>
        <form action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" name="subject" id="subject">
            </div>
            <div class="form-group">
                <label for="message">Email:</label>
                <textarea name="message" id="message" class="form-control" placeholder="Type your message here..."></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Send Message">
        </form>
    </div>
</div>
@endsection
