<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AttachmentTrait;
use Illuminate\Http\Request;
use App\Models\Book;
use Str;
use DB;

class BooksController extends Controller
{
    use AttachmentTrait;

    public function index()
    {
        $books = Book::where('user_id', \Auth::id())->select('id', 'title', 'author', 'isbn')->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required|string',
            'isbn' => 'required',
            'description' => 'required'
        ]);

        $attachment_id = $this->attacmentAction($request);

        Book::create([
            'user_id' => \Auth::id(),
            'attachment_id' => $attachment_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'description' => $request->description
        ]);

        return redirect(route('books.index'))->with('success', 'Action performed successfully.');
    }

    public function show($id)
    {
        $book = Book::findOrFail(base64_decode($id));
        return view('admin.books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail(base64_decode($id));
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required|string',
            'isbn' => 'required',
            'description' => 'required'
        ]);

        $book = Book::findOrFail(base64_decode($request->id));
        $this->removeAttachment($book->attachment_id);
        $attachment_id = $this->attacmentAction($request);

        $book->update([
            'attachment_id' => $attachment_id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'description' => $request->description
        ]);

        return redirect(route('books.index'))->with('success', 'Action performed successfully.');
    }

    public function delete(Request $request)
    {
        $book = Book::findOrFail(base64_decode($request->id));
        $this->removeAttachment($book->attachment_id);
        $book->delete();
        
        return redirect(route('books.index'))->with('success', 'Action performed successfully.');
    }

    public function attacmentAction($request)
    {
        if ($request->has('attachment'))
            $attachment_id = $this->addAttachment($request->attachment);
        else
            $attachment_id = null;

        return $attachment_id;
    }
}
