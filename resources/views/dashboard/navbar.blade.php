@section('navbar')

    <ul class="nav nav-sidebar">
        <li class="active"><a href="/admin">Admin panel <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ route('newarticle') }}">New Article</a></li>
        <li><a href="{{ route('listarticles') }}">List of article</a></li>
        <li><a href="{{ route('editarticles') }}">Edit articles</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('newtags') }}">New tags</a></li>
        <li><a href="{{ route('edittags') }}">Edit tags</a></li>
        <li><a href="{{ route('newcategories') }}">New categories</a></li>


    </ul>
    @show