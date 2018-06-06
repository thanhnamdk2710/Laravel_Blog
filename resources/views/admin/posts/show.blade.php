@extends('user.layouts.master')

@section('title', '|| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-xs">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>URL:</label>
                    <p><a href="{{ url($post->slug) }}">{{ url($post->slug) }}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Create At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {{ Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-warning btn-block']) }}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-12 mt-10">
                        {{ Html::linkRoute(
                                'posts.index',
                                '<< See All post',
                                [$post->id], ['class' => 'btn btn-default btn-block']
                        ) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
