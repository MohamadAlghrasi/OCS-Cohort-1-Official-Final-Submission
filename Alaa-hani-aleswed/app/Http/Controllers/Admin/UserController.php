<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('orders')
            ->latest()
            ->get();

        return view('admin.adminPages.users', compact('users'));
    }
    public function destroy(User $user)
    {
        if ($user->is_admin) {
            return back()->with('error', 'Cannot delete admin user');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
}
