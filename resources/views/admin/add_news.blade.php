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
            <h1>Some text</h1>
                @if(\Auth::check())
            <form action="add_news" method="post" enctype="multipart/form-data">
                @csrf
{{--                {{ csrf_field() }}--}}
                <h1> Добвить новость </h1>
                <div class="row">
                    <div class="col-md-12">
                <select class="mdb-select md-form" multiple name="category_id[]">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
                    </div>
                </div>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select><br>
                <input type="text" placeholder="News Title" name="title"><br>
                <textarea placeholder="News Body" name="body"></textarea><br>
                <input type="file" name="image"><br>
                <button class="btn-save btn btn-primary btn-sm">Save</button><br>
            </form>
                @endif

        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.mdb-select').materialSelect();
            });
        </script>

@endsection

