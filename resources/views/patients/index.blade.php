@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/patients/create">Create patient</a>
        <ul>
            @forelse ($patients as $patient)
                <li>{{ $patient->first_name }} {{ $patient->last_name }}</li>
            @empty
                <li>No patients found</li>
            @endforelse
        </ul>
    </div>
@endsection
