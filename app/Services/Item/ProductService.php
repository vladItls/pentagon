<?php

declare(strict_types=1);

namespace App\Services\Item;

use App\Models\Product;
use App\Traits\ArrayDataFromResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\Response;

class ProductService implements ItemInterface
{
    use ArrayDataFromResponse;

    public const ERROR_KEY = 'error';
    public const STATUS_KEY = 'status';
    public const ERROR_MESSAGE = 'ERROR! Product already exist!';
    public const STATUS_MESSAGE = 'SUCCESS! Product was saved!';

    /**
     * @param Response $response
     * @return string[]
     */
    public function createItem(Response $response): array
    {
        $attributes = $this->getProductFromData($response);

        try {
            $product = new Product();
            $product->fill($attributes);
            $product->save();
        } catch (QueryException $e) {
            return [self::ERROR_KEY => self::ERROR_MESSAGE];
        }

        return [self::STATUS_KEY => self::STATUS_MESSAGE];
    }

    /**
     * @param Response $response
     * @return string[]
     */
    public function getProductFromData(Response $response): array
    {
        $data = $this->getDataArrayFromResponse($response);
        $image = ['image' => $this->transformImageFormat($data)];
        $clippedData = array_slice($data, 0, -1);

        return $clippedData + $image;
    }

    /**
     * @param array $data
     * @return string
     */
    public function transformImageFormat(array $data): string
    {
        $imageKey = array_key_last($data);
        $imageValue = end($data);

        $imageType = implode(
            ';', array_reverse(
                explode(
                    ';', strstr($imageKey, 'base64')
                )
            )
        );

        return 'data:image/' . $imageType . ',' . $imageValue;
    }
}
