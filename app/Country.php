<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
