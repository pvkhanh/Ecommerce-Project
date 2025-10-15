<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Hiển thị danh sách user
    public function index(Request $request)
    {
        $query = User::query();

        // Search theo username hoặc email nếu có input
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('username', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        // Pagination, 10 user/trang
        $users = $query->orderBy('id', 'desc')->paginate(5);

        return view('admin.users.index', compact('users'));
    }
}
