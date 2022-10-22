<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
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
            'name' => 'required',
            'last_name' => 'required',
            'username' => $this->user ? "required|unique:users,username,{$this->user->id}" : "required|unique:users",
            'email' => $this->user ? "required|email|unique:users,email,{$this->user->id}" : "required|email|unique:users",
            'email_verified_at' => '',
            'password' => Rule::requiredIf(!$this->user),
            'status' => $this->user ? ['required', Rule::in(['active', 'suspended'])] : "",
            'dni' => $this->user ? "required|regex:/^[VEJPG][0-9]\d{6,11}+$/|unique:users,dni,{$this->user->id}" : "required|regex:/^[VEJPG][0-9]\d{6,11}+$/|unique:users",
            'remember_token' => '',
            'roles' => 'array',

        ];
    }
}
