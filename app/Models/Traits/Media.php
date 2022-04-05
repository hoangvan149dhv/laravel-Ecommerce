<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Models\interfaces\Media as MediaInterFace;

trait Media
{
    public function uploadMedia()
    {
        $request = request();
        if ($request->imageName && File::exists($imgName = storage_path('tmp/uploads/' . $request->imageName))) {
            $this->addMedia($imgName)
                ->toMediaCollection($this->collectionName);

            return true;
        }

        Log::error('Update image Khong thanh cong id: ' . $this->id);

        return false;
    }

    public function getImage(MediaInterFace $model)
    {
        if (!empty($img = $model->getFirstMedia($this->collectionName))) {
            $imageUrl = $img->getFullUrl();
            $model->image = $img;
            $model->image->url = $imageUrl;
        }
    }

    public function removeImage(MediaInterFace $model)
    {
        $request = request();

        if (count($model->media)) {
            foreach ($model->getMedia($this->collectionName) as $media) {
                //Remove old img
                if (!empty($request->imageName) && $request->imageName !== $media->file_name) {
                    $media->delete();
                }
            }
        }
    }
}
