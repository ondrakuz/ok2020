<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::guard()->check() && Auth::user()->role_id < Role::MODERATOR);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'url' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('articles', 'url')->ignore($this->route('article')->id)
            ],
            'user_id' => ['required', 'min:1'],
            'menu_id' => ['required', 'min:1'],
            'content' => ['required', 'min:128'],
            'description' => ['min:3', 'max:255'],
            'key_words' => ['min:3', 'max:255'],
            'perex' => ['required', 'min:128'],
        ];
    }
}
