<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>
{{--@include ('lader')--}}
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">NEWS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <form method='GET' action="/mail_subscribed">
                    <input type="text" name="email">
                    <input type="submit" value="Подписаться">
                </form>

                @inject('pages', '\App\Page')
                @foreach($pages->show_pages() as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page', $page->page)}}">{{$page->name}}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contacts')}}">Контакты</a>
                </li>

                @if(\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" style="color: red" href="{{route('add_news_get')}}">Администрирование</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" style="color: greenyellow"
                       href="{{route('login')}}">@if(\Auth::check()){{\Auth::user()->email}}
                        @else Вход @endif </a>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Search Widget -->
@yield('search')

<!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">

                        @inject('categories', '\App\Category')
                        @foreach($categories->show_categories() as $category)
                            <li>
                                <a href="{{route('news_by_category', $category->key)}}">{{$category->category}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Мы в соц. сетях</h5>
        <div class="card-body">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">

                    @inject('sn', '\App\SocialNetwork')
                    @foreach($sn->show_social_network() as $s)
                        <li>
                            <a href="{{$s->url}}">{{$s->name}}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

</div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Shvorobey 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

