<?php

use Gloudemans\Shoppingcart\Facades\Cart;

if (!function_exists('format_currency')) {
    function format_currency($price, $symbol = 'đ')
    {
        return number_format($price, 0, ',', '.') . ' ' . $symbol;
    }
}

if (!function_exists('cart')) {
    /**
     * Get data cart
     *
     * @param $method
     * @return mixed
     */
    function cart($method = 'content', $params = null)
    {
        if (is_array($params)) {
            return Cart::instance()->{$method}(...array_values($params));
        }

        return Cart::instance()->{$method}($params);
    }
}

if (!function_exists('getDataCityProvinceWard')) {
    function getDataCityProvinceWard($name, $id = null)
    {
        $model = \App\Models\City::class;
        $attribute = 'province';
        switch ($name) {
            case 'province':
                $model = app(\App\Models\Province::class);
                $attribute = 'ward';
                break;
            case 'ward':
                $attribute = null;
                $model = app(\App\Models\Ward::class);
                break;
        }
        if ($id) {
            if (!$attribute) {
                return $model::findOrFail($id);
            }

            return $model::findOrFail($id)->{$attribute};
        }

        return $model::all();
    }
}

if (!function_exists('getLocationByWard')) {
    function getLocationByWard($id = null)
    {
        $model = \App\Models\Ward::findOrFail($id);
        return [
            'city' => $model->province->city,
            'province' => $model->province,
            'ward' => $model,
        ];
    }
}
