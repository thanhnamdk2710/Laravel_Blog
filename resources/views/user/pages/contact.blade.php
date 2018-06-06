@extends('user.layouts.master')

@section('title', '|| Contact')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>About Us</h1>
        <hr>
        {!! Form::open(['route' => 'sendContact', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('email', 'Email: ') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('subject', 'Subject: ') }}
                {{ Form::text('subject', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('message', 'Message: ') }}
                {{ Form::textarea('message', null,
                    ['class' => 'form-control', 'placeholder' => 'Type your message here...', 'rows' => '5']
                ) }}
            </div>
            {{ Form::submit('Send Message', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection
