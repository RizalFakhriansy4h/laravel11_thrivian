@extends('layouts.template_main')

@section('content')

<div class="container-fluid" style="margin-top: 6%;">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('tableCommunity') }}" class="nav-link {{ $title_table == "Community"  ? "active" : "" }}" aria-current="page">
                            Community
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tableEvent') }}" class="nav-link {{ $title_table == "Event"  ? "active" : "" }}">
                            Event
                        </a>
                    </li>
                    <li>
                       <a href="{{ route('tableUser') }}" class="nav-link {{ $title_table == "User"  ? "active" : "" }}">
                            Users
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h2>{{ $title_table }}</h2>
            @yield('table')
        </div>
    </div>
</div>

@endsection
