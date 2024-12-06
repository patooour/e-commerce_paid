<?php

namespace App\Repositories\Home;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\shippingGovernorate;

class WorldRepository
{
    public function getAllCountries()
    {
        $countries = Country::all();
        return $countries;
    }
    public function getALlCitiesByGovernorate($governorate)
    {
        $cities = $governorate->cities;
        return $cities;
    }
    public function getAllgovernoratesByCountry($country)
    {
       $governorates =  $country->governorates()->paginate(10);
       return $governorates;
    }
    public function getCountryById($id)
    {
        $country =  Country::find($id);
        return $country;
    }
    public function getGovernorateById($id)
    {
        $governorate =  Governorate::find($id);
        return $governorate;
    }
    public function getCityById($id)
    {
        $city =  City::find($id);
        return $city;
    }
    public function changeStatus($model)
    {
        $model = $model ->update([
            'is_active' => $model->is_active == 1 ? 0 : 1
        ]);
        return $model;
    }

    public function search($request)
    {
        $countries = Country::where('name' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere('phone_code' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere('is_active' , 'LIKE' , '%' . $request->search_live  . '%')
            ->get();
        return $countries;
    }
    public function searchGov($request)
    {
        $governorates = Governorate::where('name' , 'LIKE' , '%' . $request->search_live . '%')
            ->orwhere('is_active' , 'LIKE' , '%' . $request->search_live  . '%')
            ->get();
        return $governorates;
    }

    public function changeShippingPrice($governorate ,$request)
    {
       $governorate->shippingPrice->price = $request->price;
       $governorate->shippingPrice->save();
       return $governorate->shippingPrice;
    }
}
