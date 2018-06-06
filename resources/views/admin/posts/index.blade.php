@extends('user.layouts.master')

@section('title', '|| All Post')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Post</h1>
        </div>
        <div class="col-md-2">
            {{ Html::linkRoute('posts.create', 'Create Post', [], ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $key => $post)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? '...' : '' }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                        <td>
                            {{ Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-warning']) }}
                            {{ Html::linkRoute('posts.show', 'View', [$post->id], ['class' => 'btn btn-info']) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
