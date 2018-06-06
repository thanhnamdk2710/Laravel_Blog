@extends('user.layouts.master')

@section('title', '|| Create New Post')

@section('styles')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({ selector:'textarea' });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

            {{ Form::label('category', 'Category:', ['class' => 'mt-10']) }}
            {{ Form::select('category', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'mt-10']) }}
            {{ Form::select('tags[]', $tags, null,
                ['class' => 'form-control select2-multi', 'multiple' => 'multiple']
            ) }}

            {{ Form::label('body', 'Post Body:', ['class' => 'mt-10']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}

            {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.full.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection
