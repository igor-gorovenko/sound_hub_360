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

    <button onclick="toggleAllSounds()">Turn On Sounds</button>

</div>

<script>
    function toggleAllSounds() {
        var audioElements = document.getElementsByClassName('sound');
        var isAnyPlaying = false;

        // Проверяем, есть ли хоть один звук включен
        for (var i = 0; i < audioElements.length; i++) {
            if (!audioElements[i].paused) {
                isAnyPlaying = true;
                break;
            }
        }

        // Если хоть один звук включен, останавливаем все звуки
        // Иначе включаем все звуки
        for (var i = 0; i < audioElements.length; i++) {
            if (isAnyPlaying) {
                audioElements[i].pause();
            } else {
                audioElements[i].play();
            }
        }


        // Обновляем текст на кнопке
        var button = document.querySelector('button');
        button.innerText = isAnyPlaying ? 'Turn On Sounds' : 'Turn Off Sounds';
    }
</script>

@endsection