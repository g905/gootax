<?php

namespace Modules\Review\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    use HasFactory;

    function author() {
        return $this->hasOne(\Modules\User\Entities\User::class, 'id', "id_author");
    }

    function city() {
        return $this->hasOne(\Modules\City\Entities\City::class, 'id', "id_city");
    }

    public function fromValid($valid = []) {
        $this->title = $valid['title'];
        $this->text = $valid['text'];
        $this->id_city = $valid['city_id'];
        $this->rating = $valid['rating'];
        $this->img = "";
        $this->id_author = auth()->id();
        $this->save();
        return $this;
    }

}
