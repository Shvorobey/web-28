@extends('Layout')

@section('title', 'О нас')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <p>{{$page->text}}</p>
                <iframe width="700" height="440"
                        src="https://maps.google.com/maps?width=900&amp;height=600&amp;hl=en&amp;q=Odessa%2C%20Ukraine%2C%20Derybasivska%20street%2C%207+(Pizzaro)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
                @if($page->page == 'about')
                    <hr>
                @endif
                <img src="{{$page->image}}" style="position: relative" alt="About">
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

