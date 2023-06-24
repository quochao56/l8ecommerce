<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ];
        $message = [
            'required' => 'Please input :attribute',
            'email' => 'Please check :attribute again',
            'string' => 'This field :attribute must a string',
            'max' => 'Length of :attribute must less than :max letter',
        ];

        $attribute = [
            'name' => 'Name',
            'email' => 'Email',
        ];
        try {
            Validator::make($input, $rules, $message, $attribute)->validate();
        } catch (ValidationException $e) {
            throw $e;
        }
        
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
