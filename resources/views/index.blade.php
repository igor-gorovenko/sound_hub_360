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
    <h6>Controlls</h6>
    <div>
        <button class="btn btn-outline-primary" onclick="toggleAllSounds()">Turn <span id="soundStatus">On</span></button>
    </div>

    <div>
        <h6>Timer</h6>
        <input type="number" id="timerInput" placeholder="Enter seconds">
        <button class="btn btn-outline-primary" onclick="startTimer()">Start Timer</button>
    </div>
</div>

<script>
    let timer;

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

    function startTimer() {
        var timerInput = document.getElementById('timerInput');
        var seconds = parseInt(timerInput.value, 10);

        if (isNaN(seconds) || seconds <= 0) {
            alert('Please enter a valid number of seconds.');
            return;
        }

        clearTimeout(timer);

        timer = setTimeout(() => {
            toggleAllSounds();
            alert('Timer finished!');
        }, seconds * 1000);
    }
</script>

@endsection