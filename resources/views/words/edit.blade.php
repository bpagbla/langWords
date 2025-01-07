<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <h1>Edit Word</h1>
    <div class="col-md-8 mx-auto">
        <!-- Formulario de edición -->
        <form action="{{ route('words.update', $word->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">

                <label for="wordFirstLang" class="form-label">Word/Phrase (First Language):</label>
                <input type="text" class="form-control" name="wordFirstLang" value="{{ $word->wordFirstLang }}"
                    required><br><br>
            </div>
            <div class="col-md-6">

                <label for="wordSecondLang" class="form-label">Translation (Second Language):</label>
                <input type="text" class="form-control" name="wordSecondLang" value="{{ $word->wordSecondLang }}"
                    required><br><br>
            </div>
            <div class="col-md-6">

                <label for="sentenceFirstLang" class="form-label">Example Sentence (First Language):</label>
                <textarea class="form-control"
                    name="sentenceFirstLang">{{ $word->sentenceFirstLang }}</textarea><br><br>
            </div>
            <div class="col-md-6">

                <label for="sentenceSecondLang" class="form-label">Example Sentence (Second Language):</label>
                <textarea class="form-control"
                    name="sentenceSecondLang">{{ $word->sentenceSecondLang }}</textarea><br><br>
            </div>
            <div class="col-md-3">
            <button type="submit" class="btn btn-primary mb-3">Update</button></div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>