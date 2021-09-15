<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Book;
use App\User;
use JWTAuth;
use Auth;

class ApiController extends Controller
{
    public $token = true;

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if(!$token = JWTAuth::attempt($credentials))
            return response()->json(['status' => 401, 'message' => 'Invalid email or Password', 'data' => '']);

        return response()->json(['status' => 200, 'message' => 'Login successfully', 'data' => $token]);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'attachment_id' => 1,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $this->login($request);

        return response()->json(['status' => 200, 'message' => 'Successfully created user', 'data' => $token]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function books(Request $request)
    {
        $books = Book::where('user_id', \Auth::id())->select('id', 'title', 'author', 'isbn')->get();

        return response()->json(['status' => 200, 'message' => '', 'data' => $books]);
    }

    public function addBook(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required',
            'author' => 'required|string',
            'isbn' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $user = $request->user();
        $book = Book::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'description' => $request->description
        ]);

        return response()->json(['status' => 200, 'message' => 'Book added successfully', 'data' => $book]);
    }

    public function showBook(Request $request)
    {
        $book = Book::find($request->id);
        if (!$book)
            return response()->json(['status' => 200, 'message' => 'No book record found', 'data' => '']);

        return response()->json(['status' => 200, 'message' => 'Book retrieved successfully', 'data' => $book]);
    }

    public function editBook(Request $request)
    {
        $book = Book::find($request->id);
        if (!$book)
            return response()->json(['status' => 200, 'message' => 'No book record found', 'data' => '']);

        return response()->json(['status' => 200, 'message' => 'Book retrieved successfully', 'data' => $book]);
    }

    public function updateBook(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required',
            'author' => 'required|string',
            'isbn' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $book = Book::find($request->id);
        if (!$book)
            return response()->json(['status' => 200, 'message' => 'No book record found', 'data' => '']);
        
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'description' => $request->description
        ]);

        return response()->json(['status' => 200, 'message' => 'Book updated successfully', 'data' => $book]);
    }

    public function deleteBook(Request $request)
    {
        $book = Book::find($request->id);
        if (!$book)
            return response()->json(['status' => 200, 'message' => 'No book record found', 'data' => '']);
        $book->delete();

        return response()->json(['status' => 200, 'message' => 'Book deleted successfully', 'data' => '']);
    }
}
