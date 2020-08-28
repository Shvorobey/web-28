@extends('Layout')

@section('title', 'Блог-Главная')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{$news->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$news->title}}</h2>
                            <p class="card-text">{{$news->body}}</p>
                            <a href="#" class="btn btn-primary">Читать полностью &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{$news->created_at}} by
                            <a href="{{route('news_by_authors' , $news->author->key)}}">{{$news->author->name}}</a>
                        </div>
                        <div class="card-footer text-muted">
                            Категории:
                            @foreach($news->category as $categor)
                                <a style="background-color: yellow" href="{{route('news_by_category', $categor->key)}}">{{$categor->category}}</a>
                            @endforeach
                        </div>
                    </div>

            <!-- Pagination -->
                @if(\Auth::check())

                <hr>
                @if(count($comments) == 0) <p>Комментариев пока нет</p>@endif
                    @foreach($comments as $comment)
                            Автор: <strong>{{$comment->author}}</strong><br>
                    {{$comment->comment}}<br>
                            Добавлен: {{$comment->created_at}} <hr>
                    @endforeach

                    <form action="save_comment" method="post" >
                        @csrf
                        {{--                {{ csrf_field() }}--}}
                        <h1> Добвить комментарий: </h1>
                        <input type="hidden" name="news_id" value="{{$news->id}}">
                        <input type="hidden" name="author" value="{{Auth::user()->name}}">
                        <textarea class="form-control" name="comment"></textarea><br>
                        <button class="btn-save btn btn-primary btn-sm">Добавить коментарий</button><br>
                    </form>

                @else
                    <p>Войдите чтобы увидеть комментарии и иметь возможность комментировать</p>
                @endif
            </div>
            @endsection

            @section('search')
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>
@endsection
