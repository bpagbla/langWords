<?php
namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $query = Word::query();
        $search = $request->input('search'); // get the searched word

        if ($search) { //search for the word
            $query->where(function ($q) use ($search) {
                $q->where('wordFirstLang', 'like', "%{$search}%")
                    ->orWhere('sentenceFirstLang', 'like', "%{$search}%")
                    ->orWhere('wordSecondLang', 'like', "%{$search}%")
                    ->orWhere('sentenceSecondLang', 'like', "%{$search}%");
            });
        }

        // pagination
        $words = $query->paginate(10);

        // return the view (with the searched word if there's any, or with all the words)
        return view('words.index', compact('words', 'search'));
    }

    public function edit($id)
    {
        // find word by id
        $word = Word::findOrFail($id);

        // return view with the word to edit
        return view('words.edit', compact('word'));
    }

    public function update(Request $request, $id)
    {
        // validate data from the edit form
        $request->validate([
            'wordFirstLang' => 'required|string|max:255',
            'wordSecondLang' => 'required|string|max:255',
            'sentenceFirstLang' => 'nullable|string',
            'sentenceSecondLang' => 'nullable|string',
        ]);

        // find word by id
        $word = Word::findOrFail($id);

        // update the fields
        $word->wordFirstLang = $request->wordFirstLang;
        $word->wordSecondLang = $request->wordSecondLang;
        $word->sentenceFirstLang = $request->sentenceFirstLang;
        $word->sentenceSecondLang = $request->sentenceSecondLang;

        // save changes
        $word->save();

        // return to index with a message of success
        return redirect()->route('words.index')->with('success', 'Word updated successfully!');
    }

}
