<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

/**
 * Class Categories.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
    ];

    public function uploadImage(Request $request)
    {
        if ($request->imageName && File::exists($categoryImage = storage_path('tmp/uploads/' . $request->imageName))) {
            $this->addMedia($categoryImage)
                ->toMediaCollection('category');

            return true;
        }

        Log::error('Update image Khong thanh cong id: ' . $this->id);

        return false;
    }
}
