<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalUsers = User::count();
    
        
        $avgRatings = DB::table('ratings')
            ->select('book_id', DB::raw('AVG(rating) as avg_rating'))
            ->groupBy('book_id');
    
       
        $ratingCounts = DB::table('books')
            ->leftJoinSub($avgRatings, 'avg_ratings', function($join) {
                $join->on('books.id', '=', 'avg_ratings.book_id');
            })
            ->select(DB::raw('ROUND(avg_ratings.avg_rating) as rounded_rating'), DB::raw('COUNT(books.id) as total'))
            ->groupBy('rounded_rating')
            ->pluck('total', 'rounded_rating')
            ->all();
    
        $ratings = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratings[$i] = $ratingCounts[$i] ?? 0;
        }
    
        return view('dashboard', [
            'totalBooks' => $totalBooks,
            'totalUsers' => $totalUsers,
            'ratingCounts' => $ratings,
        ]);
    }
}

