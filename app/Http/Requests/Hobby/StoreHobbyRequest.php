<?php

namespace App\Http\Requests\Hobby;

use Illuminate\Foundation\Http\FormRequest;

class StoreHobbyRequest extends FormRequest
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
            'main_photo'     => [
                'bail',
                'mimetypes:image/jpeg,image/jpg,image/png,image',
                'max:10240'
            ],
            'bg_photo'     => [
                'bail',
                'mimetypes:image/jpeg,image/jpg,image/png,image',
                'max:10240'
            ],

            'mini_photo'     => [
                'bail',
                'mimetypes:image/jpeg,image/jpg,image/png,image',
                'max:10240'
            ],
            'photo_list'          => [
                'bail',
                'nullable',
                'array',
                'max:4'
            ],

            'photo_list.*'         => [
                'bail',
                'mimetypes:image/jpeg,image/jpg,image/png,image',
                'max:10240'
            ],

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

            'main_photo.image'       => 'Загружаемый файл должен быть изображением',
            'main_photo.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'main_photo.max' => 'Максимальный размер каждой фотографии - 10 МБ',

            'bg_photo.image'       => 'Загружаемый файл должен быть изображением',
            'bg_photo.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'bg_photo.max' => 'Максимальный размер каждой фотографии - 10 МБ',

            'mini_photo.image'       => 'Загружаемый файл должен быть изображением',
            'mini_photo.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'mini_photo.max' => 'Максимальный размер каждой фотографии - 10 МБ',

            'photo_list.array' => 'Неверный тип данных',
            'photo_list.max' => 'Вы можете загрузить не более 4 фотографий',
            'photo_list.*.image'       => 'Загружаемый файл должен быть изображением',
            'photo_list.*.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'photo_list.*.max' => 'Максимальный размер каждой фотографии - 10 МБ',

            'text.string'       => 'Поле "Название" должно быть строкой',
            'is_display.boolean'        => 'Не верный тип данных'
//            'main_photo.image'     => 'Загружаемый файл должен быть изображением',
//            'main_photo.mimetypes' => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'main_photo.max'       => 'Максимальный размер каждой фотографии - 10 МБ',
//            'main_photo.*.image'       => 'Загружаемый файл должен быть изображением',
//            'main_photo.*.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'main_photo.*.max' => 'Максимальный размер каждой фотографии - 10 МБ',
//
//            'bg_photo.image'     => 'Загружаемый файл должен быть изображением',
//            'bg_photo.mimetypes' => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'bg_photo.max'       => 'Максимальный размер каждой фотографии - 10 МБ',
//            'bg_photo.*.image'       => 'Загружаемый файл должен быть изображением',
//            'bg_photo.*.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'bg_photo.*.max' => 'Максимальный размер каждой фотографии - 10 МБ',
//
//            'mini_photo.image'     => 'Загружаемый файл должен быть изображением',
//            'mini_photo.mimetypes' => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'mini_photo.max'       => 'Максимальный размер каждой фотографии - 10 МБ',
//            'mini_photo.*.image'       => 'Загружаемый файл должен быть изображением',
//            'mini_photo.*.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'mini_photo.*.max' => 'Максимальный размер каждой фотографии - 10 МБ',
//
//            'photo_list.array'      => 'Неверный тип данных',
//            'photo_list.max'        => 'Вы можете загрузить не более 4 фотографий',
//            'photo_list.*.image'       => 'Загружаемый файл должен быть изображением',
//            'photo_list.*.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
//            'photo_list.*.max' => 'Максимальный размер каждой фотографии - 10 МБ',

//            'mini_photo.exists'   => 'Изображения было удалено или не существует',

        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
