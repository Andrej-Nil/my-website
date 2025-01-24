<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'link' => ['required', 'string', 'max:255'],
            'display' => ['required', 'string', 'max:255'],
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
            'link.required'    => 'Поле "Название" обязательно для заполнения',
            'link.string'      => 'Поле "Название" должно быть строкой',
            'link.max'         => 'Поле "Название" не должно превышать 255 символов',
            'display.required'    => 'Поле "Название" обязательно для заполнения',
            'display.string'      => 'Поле "Название" должно быть строкой',
            'display.max'         => 'Поле "Название" не должно превышать 255 символов',
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
