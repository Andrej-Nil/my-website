<?php

namespace App\Http\Requests\Display;


use Illuminate\Foundation\Http\FormRequest;

class UpdateDisplayRequest extends FormRequest
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
            'id' => ['nullable'],
        ];
    }
//
    public function messages()
    {
        return [
            'id.required' => 'Поле "Название" обязательно для заполнения',
            'id.array'    => 'Тип данных не соответсвует',
//            'title.required'    => 'Поле "Название" обязательно для заполнения',
//            'title.string'      => 'Поле "Название" должно быть строкой',
//            'title.max'         => 'Слишком длинный запрос.',
//            'photo_id.exists'   => 'Изображения было удалено или не существует',
//            'text.required'    => 'Поле "Название" обязательно для заполнения',
//            'text.string'      => 'Поле "Название" должно быть строкой',
//            'text.max'         => 'Поле "Название" не должно превышать 10 000 символов',
        ];
    }



//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
