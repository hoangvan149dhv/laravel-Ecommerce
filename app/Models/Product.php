<?php

namespace App\Models;

use App\Models\interfaces\Media as MediaInterFace;
use App\Models\Traits\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Product extends AbstractModel implements HasMedia, MediaInterFace
{
    use HasMediaTrait;
    use Media;

    protected $view = ['index' => 'admin.product.index',
        'show' => 'admin.product.show',
        'create' => 'admin.product.create'];

    protected $collectionName = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'desc',
        'price',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getProducts($limit = 10)
    {
        $products = $this->orderbyDesc('id')->limit($limit)->get();
        $items = $products->map(function ($product) {
            $product->getImage($product);
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => format_currency($product->price),
                'image' => $product->image->url ?? asset('image/no-image.png'),
            ];
        });

        return $items;
    }

}
