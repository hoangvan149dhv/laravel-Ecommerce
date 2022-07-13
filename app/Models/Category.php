<?php

namespace App\Models;

use App\Models\Traits\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\Models\interfaces\Media as MediaInterFace;
/**
 * Class Categories.
 *
 * @package namespace App\Entities;
 */
class Category extends AbstractModel implements HasMedia, MediaInterFace
{
    use HasMediaTrait;

    use Media;

    public $view = ['index' => 'admin.category.index',
                    'show' => 'admin.category.show',
                    'create' => 'admin.category.create'];

    public $collectionName = 'category' ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
    ];
}
