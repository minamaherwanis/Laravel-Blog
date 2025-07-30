@extends('layouts.app')
@section('title')INDEX @endsection
@section('header')Blog Post @endsection


@section('content')
      <div class="m-4">
        <div class="text-center">
          <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>
     </div>
    
  
     <div class="m-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $post)
              <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user ? $post->user->name:'NOT FOUND'}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="{{route('posts.show',$post->id)}}"  class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                    <form style="display: inline" action="{{route('posts.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-danger"onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
              </tr>
            
                 
             @endforeach
      
            </tbody>
          </table>
     </div>
@endsection