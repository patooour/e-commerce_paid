<?php

namespace App\Services\Home;

use App\Models\Category;
use App\Repositories\Home\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function findById($id)
    {
       return $this->categoryRepository->findById($id);
    }
    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function store($data)
    {
        return $this->categoryRepository->store($data);
    }
    public function update($id , $request)
    {
        $category =  $this->categoryRepository->findById($id);
        return $this->categoryRepository->update($category, $request);
    }

    public function getCategoriesExceptChildren($id)
    {
     return $this->categoryRepository->getCategoriesExceptChildren($id);
    }
    public function getCategoriesParent()
    {
        return $this->categoryRepository->getCategoriesParent();
    }
    public function destroy($id)
    {
        $category = $this->categoryRepository->findById($id);
        return $this->categoryRepository->destroy($category);

    }

    public function changeStatus($catID)
    {
       return $this->categoryRepository->changeStatus($catID);
    }
}
