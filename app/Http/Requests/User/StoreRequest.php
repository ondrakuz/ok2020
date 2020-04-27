<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Helpers\RoleHelper;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MANAGER);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nick' => ['required', 'min:3', 'max:50', 'unique:users,nick'],
            'email' => ['required', 'min:10', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
            'password_confirmation' => ['required', 'min:8', 'max:255'],
            'role_id' => ['required', 'min:1', 'max:4'],
        ];
    }
}
