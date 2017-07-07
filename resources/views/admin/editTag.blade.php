@extends('dashboard.index')

@section('content')

    <h2>Редактировать тег</h2>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post" action="{{ route('edittags') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $editTag->id or "0" }}">
        <div class="form-group">
            <input class="form-control" name="name" value="{{ $editTag->name or "Не выбрана статья для редактирования" }}">
        </div>
        <div class="form-group">
            <textarea name="text" class="form-control" rows="5">{{ $editTag->description or "Не выбрана статья для редактирования" }}</textarea>
        </div>


        <button class="btn btn-primary pull-right" name="save" type="submit">Submit</button>

        <a href="{{ route('deltag',['id' => $editTag->id]) }}" class="btn btn-primary pull-right">Delete by link</a>

    </form>



@endsection