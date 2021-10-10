<?php

declare(strict_types=1);

namespace App\Services\Strategy;

interface SavingItemStrategyInterface
{
    /**
     * @param string $itemType
     * @return mixed
     */
    static function getStrategy(string $itemType);
}
