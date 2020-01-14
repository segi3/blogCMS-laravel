@extends('main')

@section('title', '| Edit post')

@section('content')

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="form-row">
    <div class="col-md-8 mb-3">

        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, ["class" => 'form-control form-control-lg']) }}

        {{ Form::label('slug', 'Slug:' )}}
        {{ Form::text('slug', null, ["class" => "form-control"]) }}

        {{ Form::label('category', 'Category:') }}
        <select name="category" class="form-control">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{ ($post->category->id == $category->id) ? 'selected':''}} >{{ $category->name }}</option>
            @endforeach 
        </select>

        {{ Form::label('body', 'Post Body:') }}
        {{ Form::textarea('body', null, ["class" => 'form-control']) }}

    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('M j, Y - H:i', strtotime($post-> created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y - H:i', strtotime($post-> updated_at)) }}</dd>
                </dl>
                <hr/>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('Save', array('class' => 'btn btn-success btn-block')) }}
                    </div>
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    {!! Form::close() !!}
@endsection