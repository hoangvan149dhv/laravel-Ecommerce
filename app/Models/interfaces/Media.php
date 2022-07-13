<?php

namespace App\Models\interfaces;


interface Media
{
    public function getImage(Media $model);

    public function removeImage(Media $model);
}
