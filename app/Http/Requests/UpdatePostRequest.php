<?php

namespace App\Http\Requests;

use Illuminate\validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'title'=>['required', Rule::unique('posts')->ignore($this->post), 'max:150'],
            'language'=>['required'],
            'description'=>['nullable'],
            'type_id'=>['nullable','exists:types,id'],
        ];
    }

    public function message(){
        return[
            'title.required'=>'titolo obbligatorio',
            'title.unique'=>'titolo già presente',
            'title.max'=>'titolo troppo lungo',
            'language.required'=>'il linguaggio è obbligatorio',
        ];
    }
}
