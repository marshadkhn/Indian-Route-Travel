<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Remove the middleware call - it's no longer supported in Laravel 12
        // Middleware will be applied in routes
    }

    /**
     * Check if the current user is an admin
     *
     * @return bool
     */
    private function isAdmin()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, "You don't have permission to access this page.");
            return false;
        }
        return true;
    }
    
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $this->isAdmin();
        
        $usersCount = User::count();
        
        return view('admin.dashboard', [
            'usersCount' => $usersCount
        ]);
    }
    
    /**
     * Show the users list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        $this->isAdmin();
        
        $users = User::paginate(10);
        
        return view('admin.users', [
            'users' => $users
        ]);
    }
    
    /**
     * Show the user edit form.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editUser(User $user)
    {
        $this->isAdmin();
        
        return view('admin.edit-user', [
            'user' => $user
        ]);
    }
    
    /**
     * Update the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, User $user)
    {
        $this->isAdmin();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:user,admin',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        
        return redirect()->route('admin.users')->with('status', 'User updated successfully!');
    }
}
