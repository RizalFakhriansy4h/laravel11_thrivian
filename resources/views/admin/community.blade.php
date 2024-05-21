@extends('admin.template_admin')

@section('title', 'Admin Community')

@section('table')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama Komunitas</th>
            <th>Category</th>
            <th>Deskripsi Komunitas</th>
            <th>Creator</th>
            <th>Is Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Communities as $community)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $community->thumbnail }}" alt="Community Image" width="50px" height="50px"></td>
                <td>{{ $community->name }}</td>
                <td>{{ $community->category }}</td>
                <td>{{ $community->description }}</td>
                <td>{{ $community->user->username }}</td>
                <td>
                    <form action="{{ route('acceptCommunity') }}" method="post">
                        @csrf
                        <input type="hidden" name="communityId" value="{{ $community->id }}">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isActive" id="activeYes" value="1" {{$community->is_active ? 'checked' : ''}}>
                            <label class="form-check-label" for="activeYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isActive" id="activeNo" value="0" {{!$community->is_active ? 'checked' : ''}}>
                            <label class="form-check-label" for="activeNo">No</label>
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-warning btn-sm">Change</button>
                    </form>
                    <!-- <button class="btn btn-danger btn-sm">Delete</button> -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
