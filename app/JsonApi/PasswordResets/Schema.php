<?php

namespace App\JsonApi\PasswordResets;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'password-resets';

    /**
     * @param \App\PasswordReset $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\PasswordReset $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        // no need to return anything because the caller only needs to know that the entry exists
        return [];
    }
}
