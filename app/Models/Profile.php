<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    const PERIODISTA_ID = 1;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
