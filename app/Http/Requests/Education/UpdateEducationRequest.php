<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'specialization'     => ['nullable', 'string', 'max:255'],
            'start' => ['required', 'date_format:Y-m-d'],
            'is_current_day' => ['nullable', 'boolean'],
            'end' => ['nullable', 'date', 'date_format:Y-m-d'],
            'text' => ['nullable', 'string'],
            'is_display' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => 'Поле "Название" обязательно для заполнения',
            'title.string'      => 'Поле "Название" должно быть строкой',
            'title.max'         => 'Поле "Название" не должно превышать 255 символов',
            'specialization.string'      => 'Поле "Название" должно быть строкой',
            'specialization.max'         => 'Поле "Название" не должно превышать 255 символов',
            'text.string'      => 'Поле "Название" должно быть строкой',
            'text.max'         => 'Поле "Название" не должно превышать 255 символов',
            'start.required'    => 'Поле "Название" обязательно для заполнения',
            'start.date'    => 'Не верный тип данных',
            'end.date'    => 'Не верный тип данных',
            'is_current_day.boolean' => 'Не верный тип данных',
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
