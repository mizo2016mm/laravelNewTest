@extends('layouts.admin')


@section('content')
    <h2>Users</h2>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
          <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
          <th>Role</th>
          <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($users)
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img height="80" width="80" src="{{ $user->photo ? $user->photo->file : "/images/No user photo.png"}}"/></td>
                <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
    </table>
@endsection