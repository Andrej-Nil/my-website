<?php

namespace App\Http\Requests\PageDescription;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageDescriptionRequest extends FormRequest
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

            'photo'    => ['bail', 'nullable', 'string', 'max:255'],
            'text'     => ['bail', 'nullable', 'string'],
//            'sort' => ['bail', 'nullable', 'int'],
            'is_display' => ['bail', 'nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => 'Поле "Название" обязательно для заполнения',
            'title.string'     => 'Поле "Название" должно быть строкой',
            'title.max'        => 'Поле "Название" не должно превышать 255 символов',


            'photo.string'     => 'Поле "Название" должно быть строкой',
            'photo.max'        => 'Поле "Название" не должно превышать 255 символов',
//            'photo_list.array' => 'Неверный тип данных',
//            'photo_list.max' => 'Вы можете загрузить не более 4 фотографий',
//            'photo_list.*.image'       => 'Загружаемый файл должен быть изображением',
//            'photo_list.*.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'photo_list.*.max' => 'Максимальный размер каждой фотографии - 10 МБ',

            'text.string'      => 'Поле "Название" должно быть строкой',

//            'sort.integer'    => 'Не верный тип данных',

            'is_display.boolean' =>  'Не верный тип данных',
        ];
    }

}
