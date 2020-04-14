<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    public function index() {
        if (Auth::guard()->check() && Auth::user()->role_id < Role::MODERATOR) {
            $user = Auth::user();
            $user->role = $user->role();
            $users = $this->userModel->getAll();
            return view('user.index', ['users' => $users, 'user' => $user]);
        } else {
            return redirect()->route('auth.login');
        }
    }
}
