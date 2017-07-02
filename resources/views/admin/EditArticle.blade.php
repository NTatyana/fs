@extends('dashboard.index')

@section('content')

   <h2>Редактировать статью</h2>

      <form method="post" action="{{ route('editarticles') }}">
         {{ csrf_field() }}
         <input type="hidden" name="id" value="{{ $article->id or "null" }}">
         <div class="form-group">
            <input class="form-control" name="name" value="{{ $article->name or "Не выбрана статья для редактирования" }}">
         </div>
         <div class="form-group">
            <textarea name="text" class="form-control" rows="5">{{ $article->text or "Не выбрана статья для редактирования" }}</textarea>
         </div>


         @if($categories_name != null)
         <div class="form-group">
            <select name="categories">
               <option selected="selected">Выберите категорию</option>
               @foreach($categories_name as $var)
                  <option value="{{ $var->id }}">{{ $var->name }}</option>
               @endforeach
            </select>
         </div>
         @endif



         @if($tags_name != null)
         <div class="form-group">
            <legend>Выберите теги</legend>
            @foreach ($tags_name as $tag)
               <?php $val=''; ?>

               @foreach ($article->tags as $artTag)
                  @if($tag->id == $artTag->id)
                     <?php $val='checked'; ?>
                  @endif
               @endforeach

               @if($val=='checked')
                  <label>
                     <input type="checkbox" checked name="checkbox{{ $tag->id }}" value="{{ $tag->id }}">
                     {{ $tag->name }}
                  </label><br>
               @else
                  <label>
                     <input type="checkbox" name="checkbox{{ $tag->id }}" value="{{ $tag->id }}">
                     {{ $tag->name }}
                  </label><br>
               @endif
            @endforeach
         </div>
         @endif


         <button class="btn btn-primary pull-right" type="submit">Submit</button>


         <a href="{{ route('delarticle',['id' => $article->id]) }}" class="btn btn-primary pull-right">Delete</a>


      </form>




<br><br>

   <h3>Добовить коментарий</h3>

   <form method="post" action="{{ route('newcomment') }}">
      {{ csrf_field() }}

      <input type="hidden" name="artId" value="{{ $article->id }}">
      <input type="hidden" name="id" value="">
      <div class="form-group">
         <input class="form-control" name="name" value="" placeholder="Название коментария">
      </div>
      <div class="form-group">
         <textarea name="text" class="form-control" rows="3" placeholder="Коментарий"></textarea>
      </div>


      <button class="btn btn-primary pull-right" type="submit">Submit</button>

   </form>



   <br><br>
   <div>
      <h3>Коментарии</h3>

      <ul>
            @foreach($comments as $comment)
            <li>
               <h4>{{ $comment->name }}</h4>
               <p>{{ $comment->text }}</p>

               <a href="{{ route('deletecomment',['id' => $comment->id]) }}">Delete</a>

               <br>
            </li>
            @endforeach
      </ul>

   </div>

@endsection