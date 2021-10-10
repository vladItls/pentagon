<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ResourceService;
use App\Services\Strategy\SavingItemStrategy;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    /**
     * @param ResourceService $resourceService
     * @return RedirectResponse
     */
    public function saveItem(ResourceService $resourceService): RedirectResponse
    {
        $response = $resourceService->getFeed();
        $itemType = stristr($response->json(), ':', true);

        try {
            $strategy = SavingItemStrategy::getStrategy($itemType);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        $item = $strategy->createItem($response);
        return redirect()->back()->with(array_key_first($item), end($item));
    }
}
