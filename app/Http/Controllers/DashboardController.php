<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_customers = User::all()->where('is_admin','0')->count();
        $total_books = Book::all()->count();

        return view('dashboard',compact('total_customers','total_books'));
    }
}
