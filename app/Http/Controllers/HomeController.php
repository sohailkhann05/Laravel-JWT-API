<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function home()
    {
        $array = [];
        $array['books'] = DB::table('books')
                            ->select('id', 'title', 'author', 'isbn')
                            ->where('user_id', Auth::id())
                            ->limit(10)
                            ->get();

        return view('admin.dashboard', $array);
    }
}
