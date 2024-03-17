<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('dashboard.genre.index', [
            'title' => 'Genre',
            'active' => 'genre',
            'genres' => Genre::all()
        ])->with('i');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Genre::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function createGenre(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:genres'
        ]);

        Genre::create($validatedData);
        return redirect()->route('genre')->with('successPost', 'Genre berhasil di tambahkan!');
    }

    public function editGenre(Request $request, Genre $genre) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:genres'
        ]);

        $genre->update($validatedData);
        return redirect()->route('genre')->with('successEdit', 'Data berhasil di Update!');
    }

    public function deleteGenre(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre')->with('successDelete', 'Genre "' . $genre->name . '" berhasil di hapus!!');
    }
}
