<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 

class BookController extends Controller
{
    use AuthorizesRequests; 
    public function index()
    {
        $books = Book::where('user_id', auth()->id())->latest()->paginate(9);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'about' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        $validated['user_id'] = auth()->id();
        $validated['rating'] = 0;

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'about' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->about = $request->about;

        if ($request->hasFile('thumbnail')) {
            $book->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }

    public function landing(Request $request)
    {
        $books = Book::query()
            ->with('user')
            ->when($request->author, fn($q) => $q->where('author', 'like', "%{$request->author}%"))
            ->latest()
            ->paginate(8);

        return view('landing', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book,
            'userHasRated' => $book->ratings()->where('user_id', auth()->id())->exists(),
        ]);
    }

    public function rate(Request $request, Book $book)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($book->user_id == auth()->id()) {
            return redirect()->back()->with('error', 'Kamu tidak bisa merating buku sendiri.');
        }

        $existing = Rating::where('book_id', $book->id)
                          ->where('user_id', auth()->id())
                          ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Kamu sudah memberikan rating.');
        }

        Rating::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'rating' => $request->rating
        ]);

        $avgRating = Rating::where('book_id', $book->id)->avg('rating');
        $book->rating = round($avgRating);
        $book->save();

        return redirect()->route('books.show', $book->id)->with('success', 'Rating berhasil diberikan.');
    }

    public function daftar()
    {
        $query = Book::withAvg('ratings', 'rating');

        if (request('author')) {
            $query->where('author', 'like', '%' . request('author') . '%');
        }

        $books = $query->get();

        if (request('rating')) {
            $books = $books->filter(function ($book) {
                return round($book->ratings_avg_rating) == request('rating');
            });
        }

        $perPage = 12;
        $page = request('page', 1);
        $books = $books->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $books,
            count($books),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('books.daftar', [
            'books' => $paginated,
        ]);
    }
}
