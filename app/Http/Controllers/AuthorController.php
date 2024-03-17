<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        return view('dashboard.author.index', [
            'title' => 'Author',
            'active' => 'author',
            'authors' => Author::all()
        ])->with('i');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Author::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function createAuthor(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:authors'
        ]);

        Author::create($validatedData);
        return redirect()->route('author')->with('successPost', 'Author berhasil ditambahkan!!');
    }

    public function editAuthor(Request $request, Author $author) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:authors'
        ]);

        $author->update($validatedData);
        return redirect()->route('author')->with('successEdit', 'Author berhasil diperbarui!!');
    }

    public function deleteAuthor(Author $author) {
        $author->delete();
        return redirect()->route('author')->with('successDelete', 'Author "' . $author->name . '" berhasil dihapus!!');
    }
}