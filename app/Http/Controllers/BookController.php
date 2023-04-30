<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()->paginate(10);

        return view('book.index', compact('books'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load(['comments' => fn($query) => $query->with('user')->latest()])
            ->loadCount('comments');

        return view('book.show', compact('book'));
    }


    public function comment(Book $book, StoreCommentRequest $request)
    {
        $book->comments()->create(array_merge($request->validated(), [
            'user_id' => auth()->id()
        ]));

        return back();
    }
}
