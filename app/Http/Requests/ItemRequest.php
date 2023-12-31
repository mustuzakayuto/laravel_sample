<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'price' => ['integer'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('messages.item_name'),
            'price' => __('messages.price'),
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => '商品名を入力してください',
            // 'price.required' => '価格を入力してください',
            // 'price.integer' => '価格を数値で入力してください',
            // 'price.min' => '価格を数値で入力してください',
        ];
    }
}
