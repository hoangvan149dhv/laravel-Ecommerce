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

    protected $collectionName = 'product' ;

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
}
