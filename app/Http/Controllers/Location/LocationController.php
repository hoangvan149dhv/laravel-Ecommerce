<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
   public function getLocation(Request $request) {
       return array_map(function ($item) {
           return ['id' => $item['id'], 'text' => $item['name']];
       }, getDataCityProvinceWard($request->type, $request->id)->toArray());
   }
}
