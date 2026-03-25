<?php

namespace App\Http\Requests\Hobby;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHobbyRequest extends FormRequest
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
            'title'     => ['bail', 'required', 'string', 'max:255'],
//            'main_photo'     => ['bail', 'nullable', 'string', 'max:255'],
//            'bg_photo'     => ['bail', 'nullable', 'string', 'max:255'],
//            'mini_photo'     => ['bail', 'nullable', 'string', 'max:255'],
//            'photo_list'     => ['nullable', 'array', 'max:4'],
//
//            'photo_list.*' => ['string', 'max:255'],

            'text' => ['bail', 'nullable', 'string'],

            'is_display' => ['bail', 'nullable', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Поле "Название" обязательно для заполнения',
            'title.string'      => 'Поле "Название" должно быть строкой',
            'title.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'main_photo.string'      => 'Поле "Название" должно быть строкой',
//            'main_photo.max'         => 'Поле "Название" не должно превышать 255 символов',
//
//            'bg_photo.string'      => 'Поле "Название" должно быть строкой',
//            'bg_photo.max'         => 'Поле "Название" не должно превышать 255 символов',
//
//            'mini_photo.string'      => 'Поле "Название" должно быть строкой',
//            'mini_photo.max'         => 'Поле "Название" не должно превышать 255 символов',
//
//
//            'photo_list.array' => 'Неверный тип данных',
//            'photo_list.max' => 'Вы можете загрузить не более 4 фотографий',

            'text.string'       => 'Поле "Название" должно быть строкой',
            'is_display.boolean'        => 'Не верный тип данных'
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }

}


