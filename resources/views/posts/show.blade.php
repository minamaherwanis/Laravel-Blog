
     @extends('layouts.app')
     
    @section('title')SHOW @endsection
    
    @section('header')Blog Post @endsection

     @section('content')
     @csrf
    
     <div class="m-4">
        <div class="card">
            <div class="p-3 mb-2 bg-info text-dark " >
              Post Info
            </div>
            <div class="card-body">
              <h5 class="card-title">Title: {{$post->title}}</h5>
              <p class="card-text">Description:{{$post->description}}</p>

            </div>
          </div>
     </div>
     <div class="m-4">
        <div class="card">
            <div class="p-3 mb-2 bg-info text-dark " >
              Post Info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name: {{$post->user ? $post->user->name:'NOT FOUND'}} </h5>
              <p class="card-text">Email:{{$post->user ? $post->user->email:'NOT FOUND'}}</p>
              <p class="card-text">Created At: {{$post->user ? $post->user->created_at:'NOT FOUND'}}</p>

            </div>
          </div>
     </div>
@endsection