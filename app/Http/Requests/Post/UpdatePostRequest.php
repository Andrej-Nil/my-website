<?php

namespace App\Http\Requests\Post;

//use App\Helpers\FormatHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
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
            'text' => ['required', 'string', 'max:10000'],
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
            'text.required'    => 'Поле "Название" обязательно для заполнения',
            'text.string'      => 'Поле "Название" должно быть строкой',
            'text.max'         => 'Поле "Название" не должно превышать 10 000 символов',
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
