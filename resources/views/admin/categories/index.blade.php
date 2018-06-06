@extends('user.layouts.master')

@section('title', '|| All Categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ date('M j, Y', strtotime($category->created_at)) }}</td>
                        <td>
                            {{ Html::linkRoute('categories.edit', 'Edit', [$category->id], ['class' => 'btn btn-warning']) }}
                            {{ Html::linkRoute('categories.show', 'View', [$category->id], ['class' => 'btn btn-info']) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $categories->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h2>New Category</h2>
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block mt-10']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
