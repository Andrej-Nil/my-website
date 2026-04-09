<?php

namespace App\Http\Requests\UserInfo;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserInfoRequest extends FormRequest
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
            'photo'     => [
                'bail',
                'mimetypes:image/jpeg,image/jpg,image/png,image',
                'max:10240'
            ],
            'first_name'     => ['bail', 'required', 'string', 'max:255'],
            'second_name'     => ['bail', 'required', 'string', 'max:255'],
            'year_birth' => ['bail', 'nullable', 'date', 'date_format:Y-m-d'],
            'profession' => ['bail', 'nullable', 'string', 'max:255'],
            'about' => ['bail', 'nullable', 'string'],

            'city' => ['bail', 'nullable', 'string', 'max:255'],
            'phone' => ['bail', 'nullable', 'string', 'max:255'],
            'mail' => ['bail', 'nullable', 'string', 'max:255'],
            'telegram' => ['bail', 'nullable', 'string', 'max:255'],
            'whatsapp' => ['bail', 'nullable', 'string', 'max:255'],
            'vk' => ['bail', 'nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [

            'photo.image'       => 'Загружаемый файл должен быть изображением',
            'photo.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'photo.max' => 'Максимальный размер каждой фотографии - 10 МБ',

            'first_name.required'    => 'Поле "Название" обязательно для заполнения',
            'first_name.string'      => 'Поле "Название" должно быть строкой',
            'first_name.max'         => 'Поле "Название" не должно превышать 255 символов',

            'second_name.required'    => 'Поле "Название" обязательно для заполнения',
            'second_name.string'      => 'Поле "Название" должно быть строкой',
            'second_name.max'         => 'Поле "Название" не должно превышать 255 символов',

            'year_birth.date'    => 'Не верный тип данных',

            'about.string'      => 'Поле "Название" должно быть строкой',


            'profession.string'      => 'Поле "Название" должно быть строкой',
            'profession.max'         => 'Поле "Название" не должно превышать 255 символов',


            'city.string'      => 'Поле "Название" должно быть строкой',
            'city.max'         => 'Поле "Название" не должно превышать 255 символов',

            'phone.required'    => 'Поле "Название" обязательно для заполнения',
            'phone.string'      => 'Поле "Название" должно быть строкой',
            'phone.max'         => 'Поле "Название" не должно превышать 255 символов',

            'mail.required'    => 'Поле "Название" обязательно для заполнения',
            'mail.string'      => 'Поле "Название" должно быть строкой',
            'mail.max'         => 'Поле "Название" не должно превышать 255 символов',

            'telegram.required'    => 'Поле "Название" обязательно для заполнения',
            'telegram.string'      => 'Поле "Название" должно быть строкой',
            'telegram.max'         => 'Поле "Название" не должно превышать 255 символов',

            'whatsapp.required'    => 'Поле "Название" обязательно для заполнения',
            'whatsapp.string'      => 'Поле "Название" должно быть строкой',
            'whatsapp.max'         => 'Поле "Название" не должно превышать 255 символов',

            'vk.required'    => 'Поле "Название" обязательно для заполнения',
            'vk.string'      => 'Поле "Название" должно быть строкой',
            'vk.max'         => 'Поле "Название" не должно превышать 255 символов',
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
