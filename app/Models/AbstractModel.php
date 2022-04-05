<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    public function getAllCategories() {
        return Category::all();
    }

    public function get($attribute) {
       return $this->$attribute;
    }
}
