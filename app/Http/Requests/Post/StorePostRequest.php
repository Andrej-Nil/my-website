<?php

namespace App\Http\Requests\Post;

//use App\Helpers\FormatHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
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
//            'photo'     => ['nullable', 'string'],
            'text' => ['required', 'string', 'max:10000'],
            'is_display' => ['nullable', 'boolean']
        ];
    }

    public function message()
    {
        return [
//            'title.required'    => 'Поле "Название" обязательно для заполнения',
//            'title.string'      => 'Поле "Название" должно быть строкой',
//            'title.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'photo.array' => 'Неверный формат данных',
//            'up_text.required'    => 'Поле "Название" обязательно для заполнения',
//            'up_text.string'      => 'Поле "Название" должно быть строкой',
//            'up_text.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'down_text.required'    => 'Поле "Название" обязательно для заполнения',
//            'down_text.string'      => 'Поле "Название" должно быть строкой',
//            'down_text.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'meta_title.required'    => 'Поле "Название" обязательно для заполнения',
//            'meta_title.string'      => 'Поле "Название" должно быть строкой',
//            'meta_title.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'meta_description.required'    => 'Поле "Название" обязательно для заполнения',
//            'meta_description.string'      => 'Поле "Название" должно быть строкой',
//            'meta_description.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'slug.required'    => 'Поле "Название" обязательно для заполнения',
//            'slug.string'      => 'Поле "Название" должно быть строкой',
//            'slug.max'         => 'Поле "Название" не должно превышать 255 символов',
//            'slug.unique'         => 'Такой адрес уже существует'
        ];
    }

//    protected function prepareForValidation(): void {
//        $this->merge([
////            'slug' => FormatHelper::slug($this->title),
//            'user_id' => Auth::id()
//        ]);
//    }


}
