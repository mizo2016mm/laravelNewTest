@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_user'))
        <p class="text-center bg-danger">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('edited_user'))
        <p class="text-center bg-success">{{session('edited_user')}}</p>
    @endif
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
                <td style="vertical-align: middle;">{{$user->id}}</td>
                <td><img height="80" width="80" src="{{ $user->photo ? $user->photo->file : "/images/No user photo.png"}}"/></td>
                <td style="vertical-align: middle;"><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td style="vertical-align: middle;">{{$user->email}}</td>
                <td style="vertical-align: middle;">{{$user->role->name}}</td>
                <td style="vertical-align: middle;">{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                <td style="vertical-align: middle;">{{$user->created_at->diffForHumans()}}</td>
                <td style="vertical-align: middle;">{{$user->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
    </table>
@endsection