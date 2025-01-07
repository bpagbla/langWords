<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<!-- Navbar with search function -->
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">Words</a>
        <form method="GET" action="{{ route('words.index') }}" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search"
                name="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-success">Search</button>
        </form>
    </div>
</nav>


    <main class="mx-5">

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif


        <!-- check for words -->
        @if ($words->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First language</th>
                        <th>Second language</th>
                        <th>Example Sentence (1st Lang)</th>
                        <th>Example Sentence (2nd Lang)</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <!-- print the words in a table -->
                    @foreach ($words as $word)
            <tr>
                <td>{{ $word->id }}</td>
                <!-- Resaltar palabra en primer idioma -->
                <td>
                    @if ($search)
                        {!! preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="fw-semibold text-primary">$1</span>', $word->wordFirstLang) !!}
                    @else
                        {{ $word->wordFirstLang }}
                    @endif
                </td>

                <!-- Resaltar palabra en segundo idioma -->
                <td>
                    @if ($search)
                        {!! preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="fw-semibold text-primary">$1</span>', $word->wordSecondLang) !!}
                    @else
                        {{ $word->wordSecondLang }}
                    @endif
                </td>

                <!-- Resaltar frase en primer idioma -->
                <td>
                    @if ($search)
                        {!! preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="fw-semibold text-primary">$1</span>', $word->sentenceFirstLang) !!}
                    @else
                        {{ !empty($word->sentenceFirstLang) ? $word->sentenceFirstLang : 'Not available' }}
                    @endif
                </td>

                <!-- Resaltar frase en segundo idioma -->
                <td>
                    @if ($search)
                        {!! preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="fw-semibold text-primary">$1</span>', $word->sentenceSecondLang) !!}
                    @else
                        {{ !empty($word->sentenceSecondLang) ? $word->sentenceSecondLang : 'Not available' }}
                    @endif
                </td>

                <!-- Botón de editar -->
                <td>
                    <a href="{{ route('words.edit', $word->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $words->links('pagination::bootstrap-4') }}
            </div> <!-- pagination -->
        @else
            <p>No words found.</p>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </main>
</body>

</html>