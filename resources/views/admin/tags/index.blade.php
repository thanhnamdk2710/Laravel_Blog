@extends('user.layouts.master')

@section('title', '|| All Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $key => $tag)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $tags->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                    <h2>New Tag</h2>
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block mt-10']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
