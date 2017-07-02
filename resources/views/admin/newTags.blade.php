@extends('dashboard.index')

@section('content')
    <h1 class="text-center">New tags</h1>
    <form method="post" action="{{ route('savetags') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="name" class="form-control" placeholder="Название тега">
        </div>
        <div class="form-group">
            <textarea name="text" class="form-control" rows="5" placeholder="Описание тега"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
    </form>

    <br>
    <h2>Список тегов</h2>

    @foreach($listOfTags as $tag)
        <h4>{{ $tag -> name }}</h4>
        <p>{{ $tag -> description }}</p>
        <a href="{{route('edittags', ['id'=> $tag->id] )}}">Edit tag</a>
        <br>
        <br>

    @endforeach



@endsection