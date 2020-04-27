<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Helpers\RoleHelper;

class UpdateRequest extends FormRequest
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
            'nick' => ['required', 'min:3', 'max:50', Rule::unique('users', 'nick')->ignore($this->route('user')->id)],
            'email' => ['required', 'min:10', 'max:255', Rule::unique('users', 'email')->ignore($this->route('user')->id)],
            'role_id' => ['required', 'min:1', 'max:4'],
        ];
    }
}
