<?php

declare(strict_types=1);

namespace App\Services\Item;

use Illuminate\Http\Client\Response;

interface ItemInterface
{
    /**
     * @param Response $response
     * @return mixed
     */
    public function createItem(Response $response);
}
