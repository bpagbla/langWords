<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="m-4">
    <h1>Edit Word</h1>

    <!-- Formulario de edición -->
    <form action="{{ route('words.update', $word->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="wordFirstLang">Word/Phrase (First Language):</label>
        <input type="text" name="wordFirstLang" value="{{ $word->wordFirstLang }}" required><br><br>

        <label for="wordSecondLang">Translation (Second Language):</label>
        <input type="text" name="wordSecondLang" value="{{ $word->wordSecondLang }}" required><br><br>

        <label for="sentenceFirstLang">Example Sentence (First Language):</label>
        <textarea name="sentenceFirstLang">{{ $word->sentenceFirstLang }}</textarea><br><br>

        <label for="sentenceSecondLang">Example Sentence (Second Language):</label>
        <textarea name="sentenceSecondLang">{{ $word->sentenceSecondLang }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>