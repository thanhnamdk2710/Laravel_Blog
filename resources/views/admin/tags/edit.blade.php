@extends('user.layouts.master')

@section('title', "|| Edit Tags")

@section('content')
    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
        {{ Form::label('name', 'Name: ') }}
        {{ Form::text('name', $tag->name, ['class' => 'form-control']) }}

        {{ Form::submit('Save Change', ['class' => 'btn btn-primary mt-10']) }}
    {!! Form::close() !!}
@endsection
