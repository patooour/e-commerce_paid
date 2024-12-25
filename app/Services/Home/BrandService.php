<?php

namespace App\Services\Home;

use App\Repositories\Home\BrandRepository;
use App\Utils\imageManager;
use Illuminate\Support\Facades\Cache;

class BrandService
{
   protected $brandRepository;
   protected $imageManager;
    public function __construct(BrandRepository $brandRepository , imageManager $imageManager)
    {
        $this->brandRepository = $brandRepository;
        $this->imageManager = $imageManager;
    }

    public function findById($id)
    {
        $brand =  $this->brandRepository->findById($id);
        if (!$brand){
            abort(404);
        }
        return $brand;
    }
    public function getAll()
    {
        return $this->brandRepository->getAll();
    }

    public function store($data)
    {
        if (!empty($data['logo'])) {
            $filename = $this->imageManager->UploadSingleImage($data['logo'], '/', 'brands');
            $data['logo'] =  $filename;
        }
        return $this->brandRepository->store($data);
    }
    public function update($id , $request)
    {
        $brand =  $this->brandRepository->findById($id);
        $filename1 = '';
        if (!empty($request->file('logo'))) {
            $this->imageManager->deleteImageFromLocale($brand->logo);
            $filename = $this->imageManager->UploadSingleImage($request->file('logo'), '/', 'brands');

            $filename1 = $filename;
        }
        return $this->brandRepository->update($brand, $request ,$filename1);
    }

       public function destroy($id)
       {
           $brand = $this->findById($id);
           if (!empty($brand->logo)) {
               $this->imageManager->deleteImageFromLocale($brand->logo);
           }
           return $this->brandRepository->destroy($brand);


    }

    public function changeStatus($brandID)
    {
        $brand = $this->findById($brandID);

        return $this->brandRepository->changeStatus($brand);
    }
}
