@extends('layouts.app')

@section('content')

<!-- Categories -->
<div class="mb-4">
    <h6>Choose category</h6>

    <ul class="nav nav-tabs">
        @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link {{ request()->is('category/' . $category->slug) ? 'active' : '' }}" href="{{ route('category.show', ['slug' => $category->slug]) }}">
                {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>

<!-- Sounds -->
<div class="mb-4">
    <h6>Sounds</h6>
    <table class="table table-bordered">
        @foreach ($sounds as $sound)
        <tr>
            <td>{{ $sound->name }}</td>
            <td>
                <audio class="sound" loop data-is-playing="false" data-source="{{ asset('storage/' . $sound->path) }}">
                    <source src="{{ asset('storage/' . $sound->path) }}" type="audio/mpeg">
                </audio>
                <div>
                    <input type="range" class="volume-slider" min="0" max="1" step="0.1" value="1" oninput="setVolume(this)">
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<div>
    <button class="btn btn-outline-primary" onclick="toggleAllSounds()">Turn <span id="soundStatus">On</span></button>
</div>


<script>
    function setVolume(slider) {
        var audio = slider.parentElement.parentElement.querySelector('.sound');
        audio.volume = slider.value;
    }

    function toggleAllSounds() {
        var audioElements = document.getElementsByClassName('sound');
        var isAnyPlayingVar = Array.from(audioElements).some(audio => audio.dataset.isPlaying === 'true');

        Array.from(audioElements).forEach(audio => {
            if (isAnyPlayingVar) {
                audio.pause();
                audio.dataset.isPlaying = 'false';
            } else {
                audio.play();
                audio.dataset.isPlaying = 'true';
            }
        });

        document.getElementById('soundStatus').innerText = isAnyPlayingVar ? 'On' : 'Off';
    }
</script>

@endsection