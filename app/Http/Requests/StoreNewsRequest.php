<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // В реальном приложении здесь должна быть проверка прав доступа
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:25120', // 5MB
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Поле заголовка обязательно для заполнения',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'content.required' => 'Содержание новости обязательно для заполнения',
            'author.required' => 'Поле автор обязательно для заполнения',
            'author.max' => 'Имя автора не должно превышать 100 символов',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Допустимые форматы изображения: jpeg, png, jpg, gif',
            'image.max' => 'Размер изображения не должен превышать 5MB',
        ];
    }
}
