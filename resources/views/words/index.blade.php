<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Task</title>
</head>

<body>
    <form method="GET" action="{{ route('words.index') }}">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <h1>Words</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif


    <!-- check for words -->
    @if ($words->count() > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First language</th>
                    <th>Second language</th>
                    <th>Example Sentence (1st Lang)</th>
                    <th>Example Sentence (2nd Lang)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($words as $word)
                    <tr>
                        <td>{{ $word->id }}</td>
                        <td>{{ $word->wordFirstLang }}</td>
                        <td>{{ $word->wordSecondLang }}</td>
                        <td>{{ !empty($word->sentenceFirstLang) ? $word->sentenceFirstLang : 'not available' }}</td>
                        <td>{{ !empty($word->sentenceSecondLang) ? $word->sentenceSecondLang : 'not available' }}</td>
                        <!-- edit button -->
                        <td>
                            <a href="{{ route('words.edit', $word->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $words->links() }} <!-- pagination -->
    @else
        <p>No words found.</p>
    @endif
</body>

</html>