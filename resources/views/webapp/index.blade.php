@extends('layouts.app')

@section('content')

<h1>Sounds</h1>

<!-- Categories -->
@foreach ($categories as $category)
<a href="#" class="category-link" data-category="{{ $category }}">{{ $category }}</a>
@endforeach

<!-- Список звуков -->
<table id="soundsList" class="table table-bordered">
    @foreach ($sounds as $sound)
    <tr class="sound-item" data-category="{{ $sound->category }}">
        <td>{{ $sound->name }}</td>
        <td>
            <audio controls>
                <source src="{{ asset('storage/' . $sound->path) }}" type="audio/mpeg">
            </audio>
        </td>
    </tr>
    @endforeach
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.category-link').click(function(e) {
            e.preventDefault();

            var selectedCategory = $(this).data('category');
            filterSounds(selectedCategory);
        });

        function filterSounds(category) {
            $.ajax({
                type: 'GET',
                url: '/filterByCategory/' + category,
                success: function(response) {
                    updateSoundsList(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function updateSoundsList(sounds) {
            // Скрыть все звуки
            $('.sound-item').hide();

            // Показать только звуки из выбранной категории
            $.each(sounds, function(index, sound) {
                $('.sound-item[data-category="' + sound.category + '"]').show();
            });
        }
    });
</script>

@endsection