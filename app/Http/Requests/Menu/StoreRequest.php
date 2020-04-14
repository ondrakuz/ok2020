<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Role;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:80'],
            'url' => ['required', 'min:3', 'max:255', 'unique:menus,url'],
            'web_structure_id' => ['required', 'min:1', 'max:2'],
            'priority' => ['required', 'min:1', 'max:20'],
            'type_of_page_id' => ['required','min:1', 'max:19'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'meta_key_words' => ['max:255'],
        ];
    }
}
