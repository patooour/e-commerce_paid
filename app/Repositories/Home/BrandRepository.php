<?php

namespace App\Repositories\Home;

use App\Models\Brand;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;

class BrandRepository
{



    public function findById($id)
    {
        $Brand = Brand::findorfail($id);
        return $Brand;
    }

    public function getAll()
    {
        $brands = Brand::all();

        $brands = Datatables::of($brands)
            ->addIndexColumn()
            ->addColumn('name', function ($brands) {
                return $brands->getTranslation('name', app()->getLocale());
            })
            ->addColumn('logo', function ($brands) {
                return view('dashboard.brands.datatables.img', compact('brands'));
            })
            ->addColumn('status', function ($brands) {
                return view('dashboard.brands.datatables.status', compact('brands'));
            })
            ->addColumn('product_count', function ($brands) {
                return $brands->products->count() == 0 ? 'not Found' : $brands->prodcts->count();
            })
            ->addColumn('actions', function ($brands) {
                return view('dashboard.brands.datatables.actions', compact('brands'));
            })
            ->make(true);
        return $brands;

    }

    public function store($data)
    {
        $Brand = Brand::create($data);
        return $Brand;
    }


    public function update($Brand, $request ,$filename)
    {
        $Brand = $Brand->update([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'logo' => $filename,
            'status' => $request->status == null ? 0 : 1,
        ]);
        return $Brand;

    }

    public function destroy($Brand)
    {
        $Brand->delete();
        Cache::forget('brands_count');
        return true;
    }

    public function changeStatus($brand)
    {
        $brand->update([
            'status' => $brand->status == 1 ? 0 : 1
        ]);
        return $brand;
    }


}
