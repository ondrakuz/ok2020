<?php

namespace App\Http\Requests\Menu;

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
        return (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MODERATOR);
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
            'url' => [
                'required', 
                'min:3', 
                'max:255', 
                Rule::unique('menus', 'url')->ignore($this->route('menu')->id)
            ],
            'web_structure_id' => ['required', 'min:1', 'max:2'],
            'priority' => ['required', 'min:1', 'max:20'],
            'type_of_page_id' => ['required','min:1', 'max:19'],
            'meta_title' => ['max:255'],
            'meta_description' => ['max:255'],
            'meta_key_words' => ['max:255'],
        ];
    }
}
