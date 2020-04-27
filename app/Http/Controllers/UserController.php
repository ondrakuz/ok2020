<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

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
        if (Auth::guard()->check() && Auth::user()->role_id == RoleHelper::ADMIN) {
            $user = Auth::user();
            $user->role = $user->role();
            $users = $this->userModel->getAll();
            //print_r($user); exit;

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
        if (Auth::guard()->check() && Auth::user()->role_id == RoleHelper::ADMIN) {
            $user = $this->userModel->getByNick($nick);
            
            if($user->role_id == RoleHelper::ADMIN) {
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
        if (Auth::guard()->check() && Auth::user()->role_id == RoleHelper::ADMIN) {
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
            return redirect()->back()->withErrors(['You don\'t have permission to this action.']);
        }
    }
    
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MANAGER) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            return view('user.create', ['user' => $this->user]);
        } else {
            return redirect()->back()->withErrors(['You don\'t have permission to this action.']);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $arr = $request->toArray();
        if ($arr['password'] === $arr['password_confirmation']) {
            unset($arr['password_confirmation']);
            $arr['password'] = Hash::make($arr['password']);
            
            if (!User::create($arr)) {
                return redirect()->back()->withErrors(['User could not been saved.']);
            }
            return redirect()->route('user.index');
        } else {
            return redirect()->back()->withErrors(['User could not been saved, because passwords are not the same.']);
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nick
     * @return \Illuminate\Http\Response
     */
    public function edit(string $nick)
    {
        if (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MANAGER) {
            $this->user = $this->userModel->getByNick($nick);
            $this->user->role = $this->user->role();
            return view('user.edit', ['user' => $this->user]);
        } else {
            return redirect()->back()->withErrors(['You don\'t have permissions to this action.']);
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Menu\UpdateRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $arr = $request->toArray();
        if (!empty($arr['password']) && $arr['password'] === $arr['password_confirmation']) {
            if (strlen($arr['password']) < 8) {
                return redirect()->back()->withErrors(['Password has to be at least 8 characters long.']);
            }
            unset($arr['password_confirmation']);
            $arr['password'] = Hash::make($arr['password']);
        } else if (!empty($arr['password']) && $arr['password'] !== $arr['password_confirmation']) {
            return redirect()->back()->withErrors(['Passwords are not the same.']);
        } else {
            unset($arr['password']);
            unset($arr['password_confirmation']);
        }
        
        if ($user->update($arr)) {
            return redirect()->route('user.index');
        } else {
            return redirect()->back()->withErrors(['User did not updated.']);
        }
    }
}
