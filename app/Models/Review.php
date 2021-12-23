<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    use HasFactory;

    function author() {
        return $this->hasOne(User::class, 'id', "id_author");
    }

    function city() {
        return $this->hasOne(City::class, 'id', "id_city");
    }

    public function fromValid($valid = []) {
        $this->title = $valid['title'];
        $this->text = $valid['text'];
        $this->id_city = $valid['city_id'];
        $this->rating = 1;
        $this->img = "";
        $this->id_author = auth()->id();
        $this->save();
        return $this;
    }

}
