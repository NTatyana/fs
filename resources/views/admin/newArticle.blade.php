@extends('dashboard.index');

@section('content')


        {{--{{ dump(Session::all()) }}--}}


    <h1 class="text-center">New Article</h1>


        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="post" action="{{ route('newarticle') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Название статьи">
            <span style="font-size: 12px;">* поле обязательное для ввода</span>

        </div>
        <div class="form-group">
            <textarea name="text" class="form-control" rows="5">{{ old("text") }}</textarea>
            <span style="font-size: 12px;">* поле обязательное для ввода</span>

        </div>

        <div class="form-group">
            <input class="" type="file" multiple accept="image/*" name="image" placeholder="Выберите картинку">
        </div>


        <div class="form-group">
            <select name="categories">
                <option selected="selected" value="{{ $id=0 }}">Выберите категорию</option>
                @foreach($categories_name as $var)
                    <option value="{{ $var->id }}">{{ $var->name }}</option>
                @endforeach
            </select>
            <br>
            <span style="font-size: 12px;">* поле обязательное для ввода/выбора</span>

        </div>


        <div class="form-group">
            <legend>Выберите теги</legend>
                @foreach($tags_name as $var)

                    <label>
                        <input type="checkbox" name="checkbox{{ $var->id }}" value="{{ $var->id }}">
                        {{ $var->name }}
                    </label><br>
                @endforeach
        </div>




        <button class="btn btn-primary pull-right" type="submit">Submit</button>
    </form>

        {{--{!! $lastId !!}--}}{{-- Вывод Id новой статьи--}}
@endsection


