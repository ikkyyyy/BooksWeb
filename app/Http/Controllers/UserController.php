<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
    
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }
    
      
        if ($request->has('verified') && $request->verified !== '') {
            if ($request->verified == '1') {
                $query->whereNotNull('email_verified_at');
            } elseif ($request->verified == '0') {
                $query->whereNull('email_verified_at');
            }
        }
    
        $users = $query->latest()->paginate(10);
    
        return view('users.index', compact('users'));
    }
    
}
