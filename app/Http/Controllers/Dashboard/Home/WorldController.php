<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\home\ShippingRequest;
use App\Services\Home\WorldService;
use Illuminate\Http\Request;

class WorldController extends Controller
{
    protected $worldService;
    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService;
    }
    public function getCountryById($id)
    {
        $country =  $this->worldService->getCountryById($id);
        return view('dashboard.world.country', compact('country'));
    }
    public function getGovernorateById($id)
    {
        $governorate = $this->worldService->getGovernorateById($id);
        return $governorate;
    }
    public function getCityById($id)
    {
        $city = $this->worldService->getCityById($id);
        return $city;
    }

    public function getAllCountries()
    {

        $countries =  $this->worldService->getAllCountries();
        return view('dashboard.world.countries', compact('countries'));
    }


    public function getAllGovernorates($countryId)
    {
        $governorates = $this->worldService->getAllGovernoratesByCountry($countryId);
        if (!$governorates){  abort(404);  }
        return view('dashboard.world.governorates', compact('governorates'));
    }
    public function getALlCitiesByGovernorate($governorateId)
    {
        $governorate = self::getGovernorateById($governorateId);
        $cities = $this->worldService->getALlCitiesByGovernorate($governorate);
        if (!$cities){
            abort(404);
        }
        return $cities;
    }


    public function changeStatus($countryID){
        $country = $this->worldService->changeStatus($countryID);
        if (!$country){
            return response()->json([
                'status' => false,
                'msg' => 'Error in changing status',
                'data' => null
            ],404);
        }
        $country = $this->worldService->getCountryById($countryID);
        return response()->json([
            'status' => 'success',
            'msg' => 'operation change successfully',
            'data' => $country
        ],200);

    }
    public function changeStatusGov($governorateID)
    {
        $governorate = $this->worldService->changeStatusGovernorate($governorateID);
        if (!$governorate){
            return response()->json([
                'status' => false,
                'msg' => 'Error in changing status',
                'data' => null
            ],404);
        }
        $governorate = $this->worldService->getGovernorateById($governorateID);

        return response()->json([
            'status' => 'success',
            'msg' => 'operation change successfully',
            'data' => $governorate
        ],200);

    }

    public function search(Request $request)
    {
        $countries = $this->worldService->search($request);
        return view('dashboard.world.includes.ajax-search', compact('countries'));
    }

    public function searchGov(Request $request)
    {
        $governorates = $this->worldService->searchGov($request);
        return view('dashboard.world.includes.ajax-search-governorates', compact('governorates'));
    }
    public function changeShippingPrice(ShippingRequest $request)
    {

        $shippingPrice = $this->worldService->changeShippingPrice($request);
        if (!$shippingPrice){
            return response()->json([
               'status' => false,
               'msg' => 'Error in changing price',
               'data' => null
            ],404);
        }
        return response()->json([
            'status' => 'success',
            'msg' => 'operation change successfully',
            'data' => $shippingPrice
        ],200);
    }


}
