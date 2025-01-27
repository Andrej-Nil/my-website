<?php

namespace App\Http\Requests\Callback;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class CallbackRequest extends FormRequest
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
            'name'     => ['required','string', 'max:20'],
            'phone'     => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:7', 'max:18'],
            'email' => ['nullable', 'string', 'email:rfc,dns', 'max:255'],
            'comment' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'name.string'     => 'Имя должно быть строкой',
            'name.max'     => 'Имя слишком длинное',

            'phone.required' => 'Поле обязательно для заполнения',
            'phone.regex' => 'Неверный формат номера',
            'phone.min' => 'Номер слишком короткий',
            'phone.max' => 'Номер слишком длинный',

            'email.string'     => 'Неверный формат данных',
            'email.max'     => 'Почта слишком длинная',
            'email.email'     => 'Почта введена не вероно',

            'comment.string'     => 'Коментарий должнен быть строкой',
            'comment.max'     => 'Коментарий слишком длинный',

//            'title.required'    => 'Поле "Название" обязательно для заполнения',
//            'title.string'      => 'Поле "Название" должно быть строкой',
//            'title.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'photo_id.exists'   => 'Изображения было удалено или не существует',
//            'link.required'    => 'Поле "Название" обязательно для заполнения',
//            'link.string'      => 'Поле "Название" должно быть строкой',
//            'link.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'display.required'    => 'Поле "Название" обязательно для заполнения',
//            'display.string'      => 'Поле "Название" должно быть строкой',
//            'display.max'         => 'Поле "Название" не должно превышать 255 символов',
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


//    public function response(array $errors)
//    {
//        return new JsonResponse(['error' => $errors], 400);
//    }


}
