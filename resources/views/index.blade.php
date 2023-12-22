@extends('layouts.app')

@section('content')

<h1>Sound Hub</h1>

<!-- Categories -->
<div>
    <h5>Select category</h5>
    @foreach ($categories as $category)
    <a href="{{ route('index.filter', ['category' => $category])  }}">{{ $category }}</a>
    @endforeach
</div>

<!-- Список звуков -->
<div>
    <h5>Sounds</h5>
    <table class="table table-bordered">
        @foreach ($sounds as $sound)
        <tr>
            <td>{{ $sound->name }}</td>
            <td>
                <audio controls class="category-audio">

                    <source src="{{ asset('storage/' . $sound->path) }}" type="audio/mpeg">
                </audio>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Кнопка для активации всех звуков -->
    <button id="toggleAllSounds" class="btn btn-primary">Activate</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Обработчик клика по кнопке "Toggle All Sounds"
        $('#toggleAllSounds').click(function() {
            toggleAllSounds();
        });

        function toggleAllSounds() {
            var audioElements = $('.category-audio');

            // Проверка, включены ли звуки
            var areSoundsPlaying = audioElements.is(function() {
                return !this.paused;
            });

            // Включение или выключение звуков в зависимости от текущего состояния
            if (areSoundsPlaying) {
                // Приостановить воспроизведение всех звуков
                audioElements.each(function() {
                    this.pause();
                });
            } else {
                // Проиграть все звуки
                audioElements.each(function() {
                    this.play();
                });
            }

            // Обновить текст кнопки
            var buttonText = areSoundsPlaying ? 'Activate' : 'Deactivate';
            $('#toggleAllSounds').text(buttonText);
        }
    });
</script>

@endsection