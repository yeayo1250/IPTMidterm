
@extends('base')

@section('content')
    <div class="container">
        <div class="mt-2"><a href="{{ url('/dashboard') }}" class="btn btn-primary text-white">Back</a></div>
        <div class="row mb-2">
        <div class="col-md-4 offset-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Create New Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/createnewpost')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="post">Post Content</label>
                            <textarea name="post" id="post" cols="30" rows="6" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary w-50" type="submit">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    </div>

@endsection