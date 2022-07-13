<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    public function getCategories($limit = null) {
        if (!$limit) {
            return Category::all();
        }
        return Category::OrderbyDesc('id')->limit($limit)->get();
    }

    public function get($attribute) {
       return $this->{$attribute};
    }
}
