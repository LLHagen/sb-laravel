<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $slugExceptionRule = '';

        if (isset($this->article) && !empty($this->article->id)) {
            $slugExceptionRule = ',slug,' . $this->article->id;
        }

        return [
            "title" => "required|min:5|max:100",
            "slug" => "required|regex:/^[a-zA-Z0-9_-]+$/u|unique:articles" . $slugExceptionRule,
            "preview" => "required|max:255",
            "description" => "required",
            "published" => "integer",
            "tags" => "string|nullable",
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'Такой символьный код уже существует.',
            'slug.regex' => 'Используйте только латинские буквы, цифры, символы тире и подчеркивания.',
        ];
    }
}
