@extends('Layout')

@section('title', 'Блог-Главная')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="add_news" method="post" enctype="multipart/form-data">
                @csrf
                {{--                {{ csrf_field() }}--}}
                <h1> Добвить новость </h1>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option @if($author->id == $news->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select><br>
                <input type="hidden" name="id" value="{{$news->id}}">
                <input type="text" placeholder="News Title" name="title" value="{{$news->title}}"><br>
                <textarea placeholder="News Body" name="body">{{$news->body}}</textarea><br>
                <input type="file" name="image"><br>
                <input type="submit" value="Save"><br>
            </form>

        </div>
@endsection

