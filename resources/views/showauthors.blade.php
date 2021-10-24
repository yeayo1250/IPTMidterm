@extends('base')

@section('content')
  <div class="container">
    <h1 class="headertxt">Authors</h1>
    <hr>
    @foreach($users as $user)
    <div class="card maincard {{($user->gender == 'Male') ? 'male' : 'female'}}">
        <div class="card-body">
            <h5 class="card-title">
                <i class="fas fa-user"></i> {{$user->name}}
            </h5>
            <h3>
                <a href="/authors/{{$user->id}}" class="btn text-white">Author Posts <i class="fas fa-comment-edit"></i></a>
            </h3>
        </div>
    </div>
    @endforeach
  </div> 
  

@endsection