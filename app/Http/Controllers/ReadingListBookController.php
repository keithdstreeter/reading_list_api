<?php

namespace App\Http\Controllers;

use App\ReadingListBook;
use Illuminate\Http\Request;
use App\Http\Resources\ReadingListBookResource;

class ReadingListBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReadingListBookResource::collection(ReadingListBook::all());
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $readinglistbook = ReadingListBook::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'author' => $request->author,
            'comments' => $request->comments,
            'priority' => $request->priority,
        ]);

        return new ReadingListBookResource($readinglistbook);
    }

    /**
     * Display the specified book.
     *
     * @param  \App\Book  $readinglistbook
     * @return \Illuminate\Http\Response
     */
    public function show(Book $readinglistbook)
    {
        return new ReadingListBookResource($readinglistbook);
    }

    /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReadingListBook  $readinglistbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $readinglistbook)
    {
        // check if currently authenticated user is the owner of the book
        if (auth()->user()->id !== $readinglistbook->user_id) {
            return response()->json(['error' => 'You can only edit your own books.'], 403);
        }

        $readinglistbook->update($request->only(['title', 'comments']));

        return new ReadingListBookResource($readinglistbook);
    }

    /**
     * Remove the specified book from storage.
     *
     * @param App\ReadingListBook  $readinglistbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $readinglistbook)
    {
        $readinglistbook->delete();

        return response()->json(null, 204);
    }
}
