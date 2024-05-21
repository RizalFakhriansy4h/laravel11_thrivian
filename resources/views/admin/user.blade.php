@extends('admin.template_admin')

@section('title', 'Admin Community')

@section('table')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>Doe</td>
            <td>johndoe</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Jane</td>
            <td>Doe</td>
            <td>janedoe</td>
        </tr>
    </tbody>
</table>
@endsection