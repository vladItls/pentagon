<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ResourceService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * @param ResourceService $resourceService
     * @return RedirectResponse|void
     */
    public function auth(ResourceService $resourceService)
    {
        return $resourceService->setSessionAccessToken();
    }
}
