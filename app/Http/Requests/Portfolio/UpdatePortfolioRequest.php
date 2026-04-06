<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'    => ['bail', 'required', 'string', 'max:255'],
            'link'     => ['bail', 'nullable', 'string', 'max:255'],
            'photo'     => ['bail','nullable', 'string', 'max:255'],

            'text'     => ['bail', 'nullable', 'string'],
            'is_display' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [

            'title.required'   => 'Поле "Название" обязательно для заполнения',
            'title.string'     => 'Поле "Название" должно быть строкой',
            'title.max'        => 'Поле "Название" не должно превышать 255 символов',


            'link.string'      => 'Поле "Название" должно быть строкой',
            'link.max'         => 'Поле "Название" не должно превышать 255 символов',


            'photo.string'     => 'Поле "Название" должно быть строкой',
            'photo.max'        => 'Поле "Название" не должно превышать 255 символов',

            'text.string'      => 'Поле "Название" должно быть строкой',

            'is_display.boolean' =>  'Не верный тип данных',

        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
