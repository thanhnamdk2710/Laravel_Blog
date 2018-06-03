@extends('user.layouts.master')

@section('title', "|| Register")

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                {{ Form::label('name', 'Name: ') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('email', 'Email: ') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password: ') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                {{ Form::label('password_confirmation', 'Confirmation Password: ') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                <br>
                {{ Form::submit('Register', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
