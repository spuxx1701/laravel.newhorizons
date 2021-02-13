<?php

namespace App\JsonApi\BugReports;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'bug-reports';

    /**
     * @param \App\BugReport $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\BugReport $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            "description" => $resource->description,
            "reproduction" => $resource->reproduction,
            'createdAt' => $resource->created_at
        ];
    }
}
