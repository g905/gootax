<?php

namespace Modules\City\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model {

    use HasFactory;

    protected $fillable = ["name"];

    protected static function newFactory() {
        return \Modules\City\Database\factories\CityFactory::new();
    }

    public function reviews() {
        return $this->hasMany(\Modules\Review\Entities\Review::class, "id_city");
    }

}
