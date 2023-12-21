@extends('layouts.app')

@section('content')

<h1>Sounds</h1>
<table class="table table-bordered">
    @foreach ($sounds as $sound)
    <tr>
        <td>{{ $sound->name }}</td>
        <td>
            <audio controls>
                <source src="{{ asset('storage/' . $sound->path) }}" type="audio/mpeg">
            </audio>
        </td>
    </tr>
    @endforeach
</table>

@endsection