<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CommentStoreRequest extends FormRequest
{

    protected static $password = "720DF6C2482218518FA20FDC52D4DED7ECC043AB";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!$this->isJson()){
            return abort(422, 'Invalid POST json');
        }

        $passwordInput = strtoupper($this->input('password'));
        if( $passwordInput != self::$password) {
            return abort(401, 'Invalid password');
        }
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'user_id'   => ['required','integer'],
            'password'  => ['required','string'],
            'text'      => ['required','string']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
          'user_id' => $this->input('id'),
          'text'    => $this->input('comments')
        ]);
    }

    public function message():array
    {
        return [
            'user_id.integer' => 'Id required',
            'user_id.required' => 'Invalid Id',
        ];
    }
}
