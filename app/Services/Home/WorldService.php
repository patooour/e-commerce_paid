<?php

namespace App\Services\Home;

use App\Repositories\Home\WorldRepository;

class WorldService
{
    protected $WorldRepository;
    public function __construct(WorldRepository $worldRepository)
    {
        $this->WorldRepository = $worldRepository;
    }

    public function getCountryById($id)
    {
        $country =  $this->WorldRepository->getCountryById($id);
        if (!$country){
            abort(404);
        }
        return $country;
    }
    public function getGovernorateById($id)
    {
        $governorate = $this->WorldRepository->getGovernorateById($id);
        if (!$governorate){
            abort(404);
        }
        return $governorate;
    }
    public function getCityById($id)
    {
        $city = $this->WorldRepository->getCityById($id);
        if (!$city){
            abort(404);
        }
        return $city;
    }

    public function getAllCountries()
    {
        return $this->WorldRepository->getAllCountries();
    }

    public function getAllGovernoratesByCountry($countryId)
    {
        $country = self::getCountryById($countryId);
        $governorates = $this->WorldRepository->getAllgovernoratesByCountry($country);
        if (!$governorates){
            abort(404);
        }
        return $governorates;
    }
    public function getALlCitiesByGovernorate($governorateId)
    {
        $governorate = self::getGovernorateById($governorateId);
        $cities = $this->WorldRepository->getALlCitiesByGovernorate($governorate);
        if (!$cities){
            abort(404);
        }
        return $cities;
    }


    public function changeStatus($id){
        $country = self::getCountryById($id);
        $country = $this->WorldRepository->changeStatus($country);

        if (!$country){
            return false;
        }
        return true;
    }
    public function changeStatusGovernorate($id){
        $governorate = self::getGovernorateById($id);
        $governorate = $this->WorldRepository->changeStatus($governorate);

        if (!$governorate){
            return false;
        }
        return true;
    }

    public function search($request)
    {
        $countries = $this->WorldRepository->search($request);
        return $countries;
    }
    public function searchGov($request)
    {
        $governorates = $this->WorldRepository->searchGov($request);
        return $governorates;
    }
    public function changeShippingPrice($request)
    {
        $governorate = $this->WorldRepository->getGovernorateById($request->id);
        if (!$governorate){
            return false;
        }
        $status = $this->WorldRepository->changeShippingPrice($governorate , $request);
        return $status;
    }
}
