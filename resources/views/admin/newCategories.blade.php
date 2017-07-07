@extends('dashboard.index');

@section('content')



    <h2>Создать новую категорию</h2>


    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form method="post" action="{{ route('newcategories') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="name" class="form-control" value="{{ old('name') }}" placeholder="Название новой категории">
        </div>
        <div class="form-group">
            <textarea name="text" class="form-control" rows="5" placeholder="Описание категории">{{ old('text') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary pull-right">Submit</button>

    </form>




    <br><br>
    <div>
        <h3>Категории</h3>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <ul>
            @foreach($listOfCategories as $categorie)
                <li>
                    <h4>{{ $categorie->name }}</h4>
                    <p>{{ $categorie->text }}</p>

                    <a href="{{ route('delcategories',['id' => $categorie->id]) }}">Delete</a>

                    <br>
                </li>
            @endforeach
        </ul>

    </div>







@endsection
