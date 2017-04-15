<?php

namespace App\Application\Http\Serializers;

use League\Fractal\Pagination\CursorInterface;
use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Serializer\SerializerAbstract;

/**
 * Create a new Serializer in your project
 * @see http://stackoverflow.com/questions/41723858/laravel-dingo-api-pagination-custom-root-key
 */
use League\Fractal\Serializer\ArraySerializer;

class CustomJsonSerializer extends ArraySerializer
{
    public function collection($resourceKey, array $data)
    {
        if (!$resourceKey) {
            return $data;
        }

        return [$resourceKey ?: 'data' => $data];
    }

    public function item($resourceKey, array $data)
    {
        if (!$resourceKey) {
            return $data;
        }

        return [$resourceKey ?: 'data' => $data];
    }
}