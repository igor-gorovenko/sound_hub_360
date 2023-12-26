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
                <audio class="sound" loop>
                    <source src="{{ asset('storage/' . $sound->path) }}" type="audio/mpeg">
                </audio>
                <div>
                    <input type="range" class="volume-slider" min="0" max="1" step="0.1" value="1" oninput="setVolume(this)">
                </div>
            </td>
        </tr>
        @endforeach

    </table>

    <button class="btn btn-outline-primary" onclick="toggleAllSounds()">Turn <span id="soundStatus">On</span></button>
</div>

<script>
    function setVolume(slider) {
        var audio = slider.parentElement.parentElement.querySelector('.sound');
        audio.volume = slider.value;
    }

    function toggleAllSounds() {
        var audioElements = document.getElementsByClassName('sound');
        var isAnyPlayingVar = Array.from(audioElements).some(audio => !audio.paused);

        Array.from(audioElements).forEach(audio => audio[isAnyPlayingVar ? 'pause' : 'play']());

        document.getElementById('soundStatus').innerText = isAnyPlayingVar ? 'On' : 'Off';
    }
</script>

@endsection