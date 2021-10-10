<?php

declare(strict_types=1);

namespace App\Services\Strategy;

use App\Services\Item\OrderService;
use App\Services\Item\ProductService;

class SavingItemStrategy implements SavingItemStrategyInterface
{
    const PRODUCT = 'product';
    const ORDER = 'order';

    /**
     * @param string $itemType
     * @return OrderService|ProductService
     * @throws \Exception
     */
    static function getStrategy(string $itemType)
    {
        switch ($itemType) {
            case self::PRODUCT:
                return new ProductService();
            case self::ORDER:
                return new OrderService();
            default:
                throw new \Exception('Unexpected Item!');
        }
    }
}
