<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    use HasFactory;

    function author() {
        return $this->hasOne(User::class, 'id', "id_author");
    }

}