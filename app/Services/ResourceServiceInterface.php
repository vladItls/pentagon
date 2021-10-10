<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\Response;

interface ResourceServiceInterface
{
    public function setSessionAccessToken();

    /**
     * @return Response
     */
    public function getFeed(): Response;
}
