<?php

namespace App\JsonApi\Users;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
    protected $allowedIncludePaths = [];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = [];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = [];

    //----------------------------------------------------------------------------//
    // Leopold Hock / 2021-01-22
    // Description:
    // Return custom response messages when specific validations fail.
    //----------------------------------------------------------------------------//
    protected $messages = [
        'email.unique:\App\Models\User' => 'That email is already in use.'
    ];
    /*protected function messages($record): array
    {
        return [
            'email.unique' => 'That email is already in use.',
            'username.unique' => 'That username is already in use.'
        ];
    }*/

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @param array $data
     *      the data being validated
     * @return array
     */
    protected function rules($record, array $data): array
    {
        //----------------------------------------------------------------------------//
        // Leopold Hock / 2021-01-22
        // Description:
        // Below rules define the validations when a new user signs up or updates
        // their user data.
        // More: https://laravel.com/docs/8.x/validation#available-validation-rules
        //----------------------------------------------------------------------------//
        return [
            "username" => [
                "required",
                "string",
                "min:4",
                "max:255"
            ],
            "email" => [
                "required",
                "string",
                "min:4",
                "max:255",
                "unique:\App\Models\User",
                "regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/"
                //previous regex: "regex:/(?!(^[.-].*|[^@]*[.-]@|.*\.{2,}.*)|^.{254}.)([a-zA-Z0-9!#$%&'*+\/=?^_`{|}~.-]+@)(?!-.*|.*-\.)([a-zA-Z0-9-]{1,63}\.)+[a-zA-Z]{2,15}/"
            ],
            "password" => [
                "required",
                "string",
                "min:8",
                "max:40",
                "regex:/^[a-zA-Z0-9!@#$%&*()-+=^]{8,40}$/"
            ]
        ];
    }

    /**
     * Get query parameter validation rules.
     *
     * @return array
     */
    protected function queryRules(): array
    {
        return [
            //
        ];
    }
}
