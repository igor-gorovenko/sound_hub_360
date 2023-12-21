<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playback</title>
</head>

<body>
    <h1>Playback</h1>
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
</body>

</html>