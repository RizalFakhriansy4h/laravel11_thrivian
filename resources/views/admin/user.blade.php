@extends('admin.template_admin')

@section('title', 'Admin Community')

@section('table')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Avatar</th>
            <th>Username</th>
            <th>Created At</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ $user->avatar }}" alt="Avatar" style="width: 40px; height: 40px; border-radius: 50%;">
            </td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->created_at->format('d F Y') }}</td>
            <td>{{ $user->role == 0 ? 'User' : 'Admin' }}</td>
            <td>
                @if($user->role == 0)
                <form method="POST" action="{{ route('makeAdmin', $user->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Make Admin</button>
                </form>
                @else
                <span class="text-muted">Already Admin</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
