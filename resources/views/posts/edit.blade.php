@extends('layouts.app')
@section('title')Edit @endsection
@section('header')Blog Post @endsection

    @section('content')
    @section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{Route('posts.update', $post->id)}}"
    "class="row g-3">
        @csrf
      @method('PUT')

        <div class="col-12">
          <label name= for="inputAddress" class="form-label">Title</label>
          <input name="title" type="text" value="{{$post->title}}" class="form-control" id="inputTitle" >
        </div>
        <div class="col-12" >
          <label for="inputAddress" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="inputTitle" rows="4" >{{$post->description}}</textarea>

        </div>
        
        <div class="col-12">
          <label  class="form-label">Post Creator</label>
          <select name="post_creater"  class="form-control">
            @foreach ($users as $user)
              <option @if ($post->user_id == $user->id) selected @endif value="{{$user->id}}" >{{$user->name}}</option>
  
            @endforeach

          </select> 
        </div>
 

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    
    @endsection