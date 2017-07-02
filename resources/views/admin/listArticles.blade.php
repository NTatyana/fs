@extends('dashboard.index');

@section('content')
    <h1>List of articles</h1>


    @foreach($article as $var)
    <h3>{{ $var -> name }}</h3>
    <p>{{ $var -> text }}</p>
    <img src="{{ $var->img }}" alt="{{ $var->img }}">

    <p>{{ $var -> categories['name'] }}</p>
    <div style="overflow: hidden;">
        @foreach($var->tags as $tag)
            <p style="width:auto; margin-right:20px;float: left;">{{ $tag->name }}</p>
        @endforeach
    </div>
    <a href="/admin/editarticles/{{ $var->id }}">Edit article</a>
    <br>

    @endforeach

@endsection
