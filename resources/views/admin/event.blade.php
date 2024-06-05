hr

@extends('admin.template_admin')

@section('title', 'Admin Event')

@section('table')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Name Event</th>
            <th>Category</th>
            <th>Description Event</th>
            <th>Creator</th>
            <th>Is Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $event->thumbnail }}" alt="Event Image" width="50px" height="50px"></td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->category }}</td>
                <td><div class="description-text">{{ $event->description }}</div></td>
                <td>{{ $event->creator->username }}</td>
                <td>
                    <form action="{{ route('acceptEvent') }}" method="post">
                        @csrf
                        <input type="hidden" name="eventId" value="{{ $event->id }}">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isActive" id="activeYes" value="1" {{$event->is_active ? 'checked' : ''}}>
                            <label class="form-check-label" for="activeYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isActive" id="activeNo" value="0" {{!$event->is_active ? 'checked' : ''}}>
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
