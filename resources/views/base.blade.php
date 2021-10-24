<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/mystyles.css')}}">
    <title>IPT MIDTERM</title>
</head>
<body id="page-top" background="{{ url(asset('image.jpg'))}}">
    <nav class="navbar navbar-expand-lg bg-gradient text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="text-white navbar-brand" href="/"><i class="fas fa-headset"></i> CheapTalk</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto ">                      
                  <li class="nav-item mx-0 mx-lg-1"><a class="text-white nav-link py-3 px-0 px-lg-3 rounded" href="/">HOME</a></li>
                    @if (!Auth::check())
                    <li class="nav-item mx-0 mx-lg-1"><a class="text-white nav-link py-3 px-0 px-lg-3 rounded" href="/login">LOGIN</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="text-white nav-link py-3 px-0 px-lg-3 rounded" href="/register">REGISTER</a></li>
                   @else
                   <li class="nav-item mx-0 mx-lg-1"><a class="text-white nav-link py-3 px-0 px-lg-3 rounded" href="/dashboard">DASHBOARD</a></li>
                   <li class="nav-item mx-0 mx-lg-1 dropdown">
                        <a class="nav-link dropdown-toggle text-white nav-link py-3 px-0 px-lg-3 rounded" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-list-alt"></i> Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(App\Models\Category::get() as $category)
                            <li>
                                <a class="dropdown-item" href="/categories/{{$category->id}}">{{$category->category}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="text-white nav-link py-3 px-0 px-lg-3 rounded" href="/authors"><i class="fas fa-users"></i> AUTHORS</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="text-white nav-link py-3 px-0 px-lg-3 rounded" href="/logout"><i class="fas fa-sign-out"></i> LOG OUT</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (session('Error'))
                   
            <div class="alert alert-danger">
                <div class="container">
                    {{session('Error') }}
                </div>
            </div>
      @endif  
      @if (session('Message'))
      <br> 
                    <br>
                    <br>
 
            <div class="alert alert-success">
                <div class="container">
                    {{session('Message') }}
                </div>
            </div>
      @endif 
      @if(session('errors'))
      <br> 
                    <br>
                    <br>
            <div class="alert alert-danger">
                <div class="container">
                    Please fill up
                   <ul>
                       @foreach(session('errors')->all() as $error)
                       <li>{{$error}} </li>
                       @endforeach
                    </ul> 
                </div>
            </div>   
        @endif

    <div class="container" style="margin-top: 6%;">
    @yield('content')
    </div>
    <style>
        img {border-image-width: cover;}
    </style>
</body>

</html>