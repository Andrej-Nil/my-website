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
            'title'     => ['required', 'string', 'max:255'],
            'photo_id'     => ['nullable', 'exists:images,id'],
            'text' => ['nullable', 'string'],
            'photo_list'     => ['nullable', 'array'],
            'is_display' => ['nullable', 'boolean']
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Поле "Название" обязательно для заполнения',
            'title.string'      => 'Поле "Название" должно быть строкой',
            'title.max'         => 'Поле "Название" не должно превышать 255 символов',
            'photo_id.exists'   => 'Изображения было удалено или не существует',
            'text.string'       => 'Поле "Название" должно быть строкой',
            'photo_list.boolean'        => 'Не верный тип данных'
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
