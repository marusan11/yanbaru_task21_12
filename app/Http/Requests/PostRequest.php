<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // trueに変更することでバリデーションが有効になる
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:20', //タイトルに関するルールを記述
            'body' => 'required|max:140', // 本文に関するルールを記述
        ];
    }

    // バリデーションメッセージのカスタマイズ（以下のメソッドを追加）
    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'titile.max' => 'タイトルは20文字以内で入力してください。',
            'body.required' => '本文は必須です。',
            'body.max' => '本文は140文字以内で入力してください。',
        ];
    }
}
