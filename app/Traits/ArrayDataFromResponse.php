<?php

namespace App\Traits;

use Illuminate\Http\Client\Response;

trait ArrayDataFromResponse
{
    /**
     * @param Response $response
     * @return array
     */
    public function getDataArrayFromResponse(Response $response): array
    {
        $values = [];
        $keys = [];

        $handledData = str_replace([':', '||'], '|', stripcslashes($response));

        preg_match_all('/\{(.+?)\}/', $handledData, $values);
        preg_match_all('/\|(.+?)\{/', $handledData, $keys);

        return array_combine($keys[1], $values[1]);
    }
}
