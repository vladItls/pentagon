<?php

declare(strict_types=1);

namespace App\Services\Item;

use App\Models\Order;
use App\Traits\ArrayDataFromResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\Response;

class OrderService implements ItemInterface
{
    use ArrayDataFromResponse;

    public const ERROR_KEY = 'error';
    public const STATUS_KEY = 'status';
    public const ERROR_MESSAGE = 'ERROR! Order already exist!';
    public const STATUS_MESSAGE = 'SUCCESS! Order was saved!';

    /**
     * @param Response $response
     * @return string[]
     */
    public function createItem(Response $response): array
    {
        $attributes = $this->getDataArrayFromResponse($response);

        try {
            $order = new Order();
            $order->fill($attributes);
            $order->save();
        } catch (QueryException $e) {
            return [self::ERROR_KEY => self::ERROR_MESSAGE];
        }

        return [self::STATUS_KEY => self::STATUS_MESSAGE];
    }
}
