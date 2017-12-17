<?php

namespace App;

use App\Traits\FilteredTrait;
use App\Traits\OrderedTrait;
use App\Traits\PaginatedTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use OrderedTrait;
    use FilteredTrait;
    use PaginatedTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $orderBy = [
        'first_name', 'last_name', 'created_at',
        'email', 'age', 'job', 'country_name', 'city_name',
    ];

    protected $filterBy = [
        'first_name', 'last_name', 'job', 'countries.name', 'cities.name'
    ];

    protected $pageLimit = 10;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeFull($query)
    {
        return $query->leftJoin('countries', 'countries.id', 'users.country_id')
            ->leftJoin('cities', 'cities.id', 'users.city_id')
            ->select('users.*', 'cities.name as city_name', 'countries.name as country_name')
            ->withCount('reviews');
    }
}
