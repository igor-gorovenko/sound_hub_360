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
        @foreach ($sounds as $sound)
        <tr>
            <td>{{ $sound->name }}</td>
            <td>
                <audio class="sound" controls loop>
                    <source src="{{ asset('storage/' . $sound->path) }}" type="audio/mpeg">
                </audio>

            </td>
        </tr>
        @endforeach

    </table>

    <button onclick="toggleAllSounds()">Toggle All Sounds</button>

</div>

<script>
    function toggleAllSounds() {
        var audioElements = document.getElementsByClassName('sound');

        for (var i = 0; i < audioElements.length; i++) {
            if (audioElements[i].paused) {
                audioElements[i].play();
            } else {
                audioElements[i].pause();
            }
        }
    }
</script>

@endsection