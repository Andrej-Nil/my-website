<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'photo'    => [
                'bail',
                'mimetypes:image/jpeg,image/jpg,image/png,image',
                'max:10240'
            ],
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

            'link.required'    => 'Поле "Название" обязательно для заполнения',
            'link.string'      => 'Поле "Название" должно быть строкой',
            'link.max'         => 'Поле "Название" не должно превышать 255 символов',

            'photo.image'      => 'Загружаемый файл должен быть изображением',
            'photo.mimetypes'  => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'photo.max'        => 'Максимальный размер каждой фотографии - 10 МБ',

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
