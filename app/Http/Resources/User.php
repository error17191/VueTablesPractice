<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\City as CityResource;
use App\Http\Resources\Country as CountryResource;

class User extends Resource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age,
            'job' => $this->job,
            'created_at' => $this->created_at->format('Y-m-d g:i A'),
            'country_name' => $this->country->name,
            'city_name' => $this->city->name
        ];
    }
}
