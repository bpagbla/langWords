<?php
namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $query = Word::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('wordFirstLang', 'LIKE', '%' . $request->search . '%')
                ->orWhere('wordSecondLang', 'LIKE', '%' . $request->search . '%');
        }

        $words = $query->paginate(10);



        return view('words.index', compact('words'));
    }


    public function create()
    {
        return view('words.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'word' => 'required',
            'translation' => 'required',
        ]);

        Word::create($request->all());
        return redirect()->route('words.index')->with('success', 'Word created successfully.');
    }

    public function edit($id)
    {
        // Buscar la palabra por ID
        $word = Word::findOrFail($id);

        // Retornar la vista con la palabra a editar
        return view('words.edit', compact('word'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'wordFirstLang' => 'required|string|max:255',
            'wordSecondLang' => 'required|string|max:255',
            'sentenceFirstLang' => 'nullable|string',
            'sentenceSecondLang' => 'nullable|string',
        ]);

        // Encontrar la palabra por ID
        $word = Word::findOrFail($id);

        // Actualizar los campos con los nuevos valores
        $word->wordFirstLang = $request->wordFirstLang;
        $word->wordSecondLang = $request->wordSecondLang;
        $word->sentenceFirstLang = $request->sentenceFirstLang;
        $word->sentenceSecondLang = $request->sentenceSecondLang;

        // Guardar los cambios
        $word->save();

        // Redirigir a la lista de palabras con un mensaje de éxito
        return redirect()->route('words.index')->with('success', 'Word updated successfully!');
    }


    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words.index')->with('success', 'Word deleted successfully.');
    }
}
