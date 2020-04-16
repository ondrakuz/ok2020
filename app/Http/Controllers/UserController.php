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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::guard()->check() && Auth::user()->role_id == Role::ADMIN) {
            $user = Auth::user();
            $user->role = $user->role();
            $users = $this->userModel->getAll();

            return view('user.index', ['users' => $users, 'user' => $user]);
        } else {
            return redirect()->back()->withErrors(['You don\'t have permission to enter this part of administrator.']);
        }
    }
    
    /**
     * Change permissions of user up.
     *
     * @param  string  $nick
     * @return \Illuminate\Http\Response
     */
    public function permissionsUp(string $nick) {
        if (Auth::guard()->check() && Auth::user()->role_id == Role::ADMIN) {
            $user = $this->userModel->getByNick($nick);
            
            if($user->role_id == Role::ADMIN) {
                return redirect()->back()->withErrors(['Role can not be changed.']);
            }
            
            $user->fill(['role_id' => ($user->role_id - 1)]);
            if (!$user->save()) {
                return redirect()->back()->withErrors(['Role did not changed.']);
            } else {
                return redirect()->route('user.index');
            }
        } else {
            return redirect()->back()->withErrors(['You don\'t have permission to do this action.']);
        }
    }
    
    /**
     * Change permissions of user down.
     *
     * @param  string  $nick
     * @return \Illuminate\Http\Response
     */
    public function permissionsDown(string $nick) {
        if (Auth::guard()->check() && Auth::user()->role_id == Role::ADMIN) {
            $user = $this->userModel->getByNick($nick);
            
            if($user->id == 1) {
                return redirect()->back()->withErrors(['Role can not be changed.']);
            }
            
            $user->fill(['role_id' => ($user->role_id + 1)]);
            if (!$user->save()) {
                return redirect()->back()->withErrors(['Role did not changed.']);
            } else {
                return redirect()->route('user.index');
            }
        } else {
            return redirect()->back()->withErrors(['You don\'t have permission to do this action.']);
        }
    }
}
