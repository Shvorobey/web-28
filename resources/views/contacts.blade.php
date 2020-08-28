@extends('Layout')

@section('title', 'Контакты')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <h1>Наши контакты:</h1>
                    <ol>
                        @foreach($contacts as $contact)
                        <li>{{$contact->type}} - {{$contact->contact}}</li>
                        @endforeach
                    </ol>
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

