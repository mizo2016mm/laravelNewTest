@extends('layouts/admin')



@section('content')

    <h1>Posts</h1>

    <table class="table table-striped">
        <thead>
          <tr>
              <th>id</th>
              <th>Title</th>
              <th>Body</th>
              <th>Owner</th>
              <th>Category</th>
              <th>Photo</th>
              <th>created_at</th>
              <th>updated_at</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td><img height="80" width="80" src="{{ $post->photo ? $post->photo->file : "/images/No user photo.png"}}"/></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
        @endif
        </tbody>
    </table>
@stop