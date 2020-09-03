@extends('Layout')

@section('title', 'Новости автора')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="my-4">Все новости автора:
                    <small style="color: red">{{$author->name}}</small>
                </h1>
            @foreach($author->news as $new)
                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{$new->img}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$new->title}}</h2>
                            <p class="card-text">{{$new->body}}</p>
                            <a href="{{route('single_news', $new->id)}}" class="btn btn-primary">Читать полностью &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{$new->created_at}}
                        </div>
                        <div class="card-footer text-muted">
                            Категории:
                            @foreach($new->category as $categor)
                                <a style="background-color: yellow" href="{{route('news_by_category', $categor->key)}}">{{$categor->category}}</a>
                            @endforeach
                        </div>
                    </div>
            @endforeach

            <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>
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
