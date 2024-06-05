@extends('admin.template_admin')

@section('title', 'Admin Community')

@section('table')
<style>
    .description-text {
        max-width: 300px;
        word-wrap: break-word;
        white-space: pre-wrap;
    }
</style>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Name Community</th>
            <th>Category</th>
            <th>Description Community</th>
            <th>Creator</th>
            <th>Is Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($communities as $community)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $community->thumbnail }}" alt="Community Image" width="50px" height="50px"></td>
                <td>{{ $community->name }}</td>
                <td>{{ $community->category }}</td>
                <td><div class="description-text">{{ $community->description }}</div></td>
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
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
