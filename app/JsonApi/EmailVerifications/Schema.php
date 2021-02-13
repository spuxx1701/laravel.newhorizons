<?php

namespace App\JsonApi\EmailVerifications;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'email-verifications';

    /**
     * @param \App\EmailVerification $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\EmailVerification $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        // no need to return any properties since the caller is only interested in the status code
        return [];
    }
}
