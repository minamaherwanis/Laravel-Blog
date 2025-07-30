@extends('layouts.app')
@section('title')Create @endsection
@section('header')Blog Post @endsection

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
    
    <form method="POST" action="{{Route('posts.store')}}"
        class="row g-3">
        @csrf

        <div class="col-12">
          <label name= for="inputAddress" class="form-label">Title</label>
          <input name="title" type="text" class="form-control" id="inputTitle" required >
        </div>
        <div class="col-12" >
          <label for="inputAddress" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="inputTitle" rows="4" placeholder="اكتب الوصف هنا..." required></textarea>

        </div>
        
        <div class="col-12">
          <label  class="form-label">Post Creator</label>
          <select name="post_creater"  class="form-control" required>
            @foreach ($users as $user)
              <option value="{{$user->id}}" >{{$user->name}}</option>
  
            @endforeach

          </select> 
        </div>
 

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    
    @endsection