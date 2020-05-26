@extends('templates.app')

@section('content')
    <a href="{{ url('posts') }}" class="btn btn-default">Go Back</a>
    <br /><br />
    <div class="well">
        <h1>{{ $post->title }}</h1>
        <img style="width: 100%" src="{{ url('storage/cover_images') }}/{{ $post->cover_image }}" alt="">
        <div>
            <p>{!! $post->body !!}</p>
        </div>
        <hr>
        <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="{{ url('posts') }}/{{ $post->id }}/edit" class="btn btn-default">Edit</a>
                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'class' => 'pull-right']) !!}
                    {{ Form::hidden('_method' ,'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger',]) }}
                {!! Form::close() !!}
            @endif
        @endif
    </div>
@endsection