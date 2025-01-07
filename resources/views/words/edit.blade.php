<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>