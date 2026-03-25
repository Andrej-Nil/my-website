<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
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
//            'media'    => ['bail', 'required', 'array'],

            'media'     => [
                'bail',
                'required',
                'mimetypes:image/jpeg,image/jpg,image/png,image/gif,image/webp',
                'max:10240'
            ],

//            'count'    => ['bail', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'media.require'       => 'Загружаемый файл должен быть изображением',
            'media.image'       => 'Загружаемый файл должен быть изображением',
            'media.mimetypes'     => 'Допускаются только изображения форматов: jpg, jpeg, png, gif',
            'media.max' => 'Максимальный размер каждой фотографии - 10 МБ',
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
