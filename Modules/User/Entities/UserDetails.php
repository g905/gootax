<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model {

    use HasFactory;

    protected $fillable = [
        "fio",
        "user_id",
        "phone",
        "email"
    ];

}
