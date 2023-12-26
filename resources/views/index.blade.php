@extends('layouts.app')

@section('content')

<h1>Sound Hub</h1>

<!-- Categories -->
<h5>Select category</h5>
<ul>
    @foreach ($categories as $category)
    <li>
        <a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
    </li>
    @endforeach
</ul>

<!-- Список звуков -->
<div>
    <h5>Sounds</h5>
    <table class="table table-bordered">
        <tbody>
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
        </tbody>
    </table>
</div>

@endsection