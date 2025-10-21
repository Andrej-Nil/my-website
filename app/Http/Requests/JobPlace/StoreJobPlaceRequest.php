<?php

namespace App\Http\Requests\JobPlace;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobPlaceRequest extends FormRequest
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
            'profession'     => ['nullable', 'string', 'max:255'],
            'start' => ['required', 'date_format:Y-m-d'],
            'is_current_job' => ['nullable', 'boolean'],
            'end' => ['nullable', 'date', 'date_format:Y-m-d'],
            'text' => ['nullable', 'string'],
            'is_display' => ['nullable', 'boolean'],
            'sort' => ['nullable', 'int']
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Поле "Название" обязательно для заполнения',
            'title.string'      => 'Поле "Название" должно быть строкой',
            'title.max'         => 'Поле "Название" не должно превышать 255 символов',
            'profession.string'      => 'Поле "Название" должно быть строкой',
            'profession.max'         => 'Поле "Название" не должно превышать 255 символов',
            'text.string'      => 'Поле "Название" должно быть строкой',
            'text.max'         => 'Поле "Название" не должно превышать 255 символов',
            'start.required'    => 'Поле "Название" обязательно для заполнения',
            'start.date'    => 'Не верный тип данных',
            'end.date'    => 'Не верный тип данных',
            'sort.integer'    => 'Не верный тип данных',
            'is_display.boolean' =>  'Не верный тип данных',
//            'photo_id.exists'   => 'Изображения было удалено или не существует',
//            'text.string'       => 'Поле "Название" должно быть строкой',
//            'photo_list.boolean'        => 'Не верный тип данных'
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
